<?php

namespace Zenepay\FilamentBuddhistDatePicker;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Closure;

class BuddhistDatePickerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-buddhist-date-picker';

    public static string $viewNamespace = 'filament-buddisht-date-picker';

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

    public function packageRegistered(): void
    {
    }

    public function bootingPackage()
    {
        FilamentAsset::register([
            AlpineComponent::make('buddhist-date-time-picker', __DIR__ . '/../dist/js/buddhist-date-time-picker.js'),
        ], 'zenepay/filament-buddhist-date-picker');

        DatePicker::macro('buddhist', function (bool|int|string|array $onlyLocales = [], bool $weekdaysMin = true,) {
            /** @var DatePicker $this */
            $this->native(false);
            $this::$defaultDateTimeDisplayFormat = 'm/d/Y';
            $hourMode = empty($this->getExtraAttributes()['hourMode']) ? 24 : $this->getExtraAttributes()['hourMode'];
            $this->view = "filament-buddisht-date-picker::date-time-picker";
            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales), 'weekdaysMin' => (int) $weekdaysMin, 'hourMode' => $hourMode]);

            return $this;
        });

        DateTimePicker::macro('buddhist', function (bool|int|string|array $onlyLocales = '', bool $weekdaysMin = true) {
            /** @var DateTimePicker $this */
            $this->native(false);
            $this::$defaultDateTimeDisplayFormat = 'm/d/Y H:i:s';
            //$hourMode = $this->getExtraAttributes()['hourMode'] ?? 24;
            $hourMode = empty($this->getExtraAttributes()['hourMode']) ? 24 : $this->getExtraAttributes()['hourMode'];
            $this->view = "filament-buddisht-date-picker::date-time-picker";

            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales), 'weekdaysMin' => (int) $weekdaysMin, 'hourMode' => $hourMode]);
            return $this;
        });

        DateTimePicker::macro('hourMode', function (int | Closure | null $hourMode = 12) {
            /** @var DateTimePicker $this */
            $this->native(false);
            $this::$defaultDateTimeDisplayFormat = 'd/m/y h:i A';
            // $this::$hasSeconds = false;
            $onlyLocales = $this->getExtraAttributes()['onlyLocales'] ?? 0;
            $weekdaysMin = $this->getExtraAttributes()['onlyLocales'] ?? 1;
            // $this->closeOnDateSelection(true);
            $this->view = "filament-buddisht-date-picker::date-time-picker";
            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales), 'weekdaysMin' => (int) $weekdaysMin, 'hourMode' => $hourMode]);
            return $this;
        });
    }


    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }
}
