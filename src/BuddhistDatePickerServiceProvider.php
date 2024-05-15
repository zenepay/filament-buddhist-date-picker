<?php

namespace ZenEpay\FilamentBuddhistDatePicker;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BuddhistDatePickerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-buddhist-date-picker';

    public static string $viewNamespace = 'filament-buddisht-date-picker';

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
            AlpineComponent::make('buddhist-date-time-picker', __DIR__ . '/../resources/dist/js/buddhist-date-time-picker.js'),
        ], 'zenepay/filament-buddhist-date-picker');

        DatePicker::macro('buddhist', function (bool|int|string|array $onlyLocales = [], bool $weekdaysMin = true,) {
            /** @var DatePicker $this */
            $this->native(false);
            $this->view = "filament-buddisht-date-picker::date-time-picker";
            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales), 'weekdaysMin' => $weekdaysMin]);
            //$this->extraAttributes(['data-weekdays-min' => ($weekdaysMin ? 'min' : 'short')], true);
            return $this;
        });

        DateTimePicker::macro('buddhist', function (bool|int|string|array $onlyLocales = '', bool $weekdaysMin = false,) {
            /** @var DateTimePicker $this */
            $this->native(false);
            $this->view = "filament-buddisht-date-picker::date-time-picker";
            $this->extraAttributes(['onlyLocales' => is_array($onlyLocales) ? implode(',', $onlyLocales) : "$onlyLocales", 'weekdaysMin' => $weekdaysMin]);
            //$this->extraAttributes(['data-weekdays-min' => ($weekdaysMin ? 'min' : 'short')], true);
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
