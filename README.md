<p align="center">
    <img src="https://github.com/filamentphp/filament/assets/41773797/8d5a0b12-4643-4b5c-964a-56f0db91b90a" alt="Banner" style="width: 100%; max-width: 800px;" />
</p>

<p align="center">
    <a href="https://github.com/filamentphp/filament/actions"><img alt="Tests passing" src="https://img.shields.io/badge/Tests-passing-green?style=for-the-badge&logo=github"></a>
    <a href="https://laravel.com"><img alt="Laravel v10.x" src="https://img.shields.io/badge/Laravel-v10.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://livewire.laravel.com"><img alt="Livewire v3.x" src="https://img.shields.io/badge/Livewire-v3.x-FB70A9?style=for-the-badge"></a>
    <a href="https://php.net"><img alt="PHP 8.1" src="https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php"></a>
</p>

<p align="center">
    <a href="https://trendshift.io/repositories/238" target="_blank"><img src="https://trendshift.io/api/badge/repositories/238" alt="filamentphp%2Ffilament | Trendshift" style="width: 250px; height: 55px;" /></a>
</p>


# Filament Buddhist DatePicker/DateTimePicer Field


This package adds buddhistEra support to filament v3 `DatePicker` and `DateTimePicker`.

## Installation

You can install the package via composer:

```bash
composer require zenepay/filament-buddhist-date-picker
```

## Usage
### 1. For all languages in Buddhist year
```php

\Filament\Forms\Components\DatePicker::make('start_date')->buddhist();
\Filament\Forms\Components\DatePicker::make('start_date')->buddhist();

```
### 2. For all Thai language in Christian year
```php
\Filament\Forms\Components\DatePicker::make('start_at')->buddhist(false);
\Filament\Forms\Components\DatetimePicker::make('start_at')->buddhist(false);
```
### 2. For some languages in Buddhist year
```php

\Filament\Forms\Components\DatePicker::make('birth_date')->buddhist(onlyLocales:['th','en']);
\Filament\Forms\Components\DateTimePicker::make('birth_date')->buddhist(onlyLocales:['th','en']);

```
### 3. For display weekdays Min or set weekdaysMin:false for weekdays Short format

```php

\Filament\Forms\Components\DatePicker::make('start_at')->buddhist(onlyLocales:['th','en'],weekdaysMin:true);
\Filament\Forms\Components\DatetimePicker::make('start_at')->buddhist(onlyLocales:['th','en'],weekdaysMin:true);
```
You can also use this way
```php
// 
use Zenepay\FilamentBuddhistDatePicker\BuddhistDatePicker;
BuddhistDatePicker::make('start_date'),
// or with options
BuddhistDatePicker:make('birth_date')->onlyLocales(['th','en'])->weekdaysMin(false),


## Credits

- [zenepay](https://github.com/zenepay)
- [All Contributors](../../contributors)

## License

The MIT License (MIT)

