<?php

namespace Zenepay\FilamentBuddhistDatePicker;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Closure;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class BuddhistDatePickerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-buddhist-date-picker';

    public static string $viewNamespace = 'filament-buddhist-date-picker';

    protected int | Closure | null $hourMode = 24;


    /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
    */
    public function configurePackage(Package $package): void
    {
        $package->name('filament-buddhist-date-picker')
            ->hasTranslations();

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function bootingPackage()
    {
        FilamentAsset::register([
            AlpineComponent::make('buddhist-date-time-picker', __DIR__ . '/../dist/js/buddhist-date-time-picker.js'),
        ], 'zenepay/filament-buddhist-date-picker');

        DatePicker::macro('buddhist', function (bool|int|string|array $onlyLocales = [], bool $weekdaysMin = true,) {
            /** @var DatePicker $this */
            $this->native(false);
            $this->defaultDateDisplayFormat('d/m/Y');
            // $this->displayFormat('d/m/Y');
            $hourMode = empty($this->getExtraAttributes()['hourMode']) ? 24 : $this->getExtraAttributes()['hourMode'];
            $this->view("filament-buddhist-date-picker::date-time-picker");
            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales), 'weekdaysMin' => (int) $weekdaysMin, 'hourMode' => $hourMode]);
            $this->suffixIcon('heroicon-o-calendar', isInline: true);
            return $this;
        });

        DateTimePicker::macro('buddhist', function (bool|int|string|array $onlyLocales = '', bool $weekdaysMin = true) {
            /** @var DateTimePicker $this */
            $this->native(false);
            $this->defaultDateTimeDisplayFormat('d/m/Y H:i');
            $hourMode = $this->getExtraAttributes()['hourMode'] ?? 24;
            $hourMode = empty($this->getExtraAttributes()['hourMode']) ? 24 : $this->getExtraAttributes()['hourMode'];
            $this->view("filament-buddhist-date-picker::date-time-picker");

            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales), 'weekdaysMin' => (int) $weekdaysMin, 'hourMode' => $hourMode]);
            return $this;
        });

        DateTimePicker::macro('hourMode', function (int | Closure | null $hourMode = 12) {
            /** @var DateTimePicker $this */
            $this->native(false);
            $this->defaultDateTimeDisplayFormat('d/m/Y H:i A');
            // $this::$hasSeconds = false;
            $onlyLocales = $this->getExtraAttributes()['onlyLocales'] ?? 0;
            $weekdaysMin = $this->getExtraAttributes()['onlyLocales'] ?? 1;
            // $this->closeOnDateSelection(true);
            $this->view("filament-buddhist-date-picker::date-time-picker");
            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales), 'weekdaysMin' => (int) $weekdaysMin, 'hourMode' => $hourMode]);
            $this->suffixIcon('heroicon-o-calendar', isInline: true);
            return $this;
        });

        TextColumn::macro('buddhistDate', function (?string $format = 'm/d/Y', bool|array $onlyLocales = true, ?string $timezone = null) {
            /** @var TextColumn $this */
            $this->date();

            //$format ??= Table::defaultDateDisplayFormat('d/m/Y');
            BuddhistDatePickerServiceProvider::formatBuddhistDateTime($this, $format, $onlyLocales, $timezone);
            return $this;
        });

        TextColumn::macro('buddhistDateTime', function (?string $format = 'm/d/Y H:i:s', bool|array $onlyLocales = true, ?string $timezone = null) {
            /** @var TextColumn $this */
            $this->dateTime();

            $this->formatBuddhistDateTime($this, $format, $onlyLocales, $timezone);

            return $this;
        });
    }

    public static function formatBuddhistDateTime(TextColumn $column, ?string $format = null, bool|int|array $onlyLocales = true, ?string $timezone = null)
    {
        $column->formatStateUsing(static function (TextColumn $column, $state) use ($format, $onlyLocales, $timezone): ?string {
            if (blank($state)) {
                return null;
            }
            if ((is_array($onlyLocales) && in_array(app()->getLocale(), $onlyLocales)) || $onlyLocales === true) {
                $year = Carbon::parse($state)->format('Y') + 543;
                $shortYear = Carbon::parse($state)->format('y') + 43;
                $format = str_replace('Y', $year, $format); // d/m/2567
                $format = str_replace('y', $shortYear, $format); // d/m/67
            }
            return Carbon::parse($state)
                ->setTimezone($timezone ?? $column->getTimezone())
                ->translatedFormat($format);
        });
        //return $column;
    }
}
