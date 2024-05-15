<p align="center">
    <img src="https://github.com/zenepay/filament-buddhist-date-picker/blob/main/laravel_buddhist_cover.png" alt="Banner" style="width: 100%; max-width: 800px;" />
</p>




# Filament Buddhist DatePicker/DateTimePicker Extension


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


# Filament DatePicker และ DateTimePicker Extension สำหรับ calendar ภาษาไทย และ ปี พุทธศักราช  


ใช้สำหรับ Larvavel 10 และ 11 Filament v3 `DatePicker`  `DateTimePicker`.

## การติดตั้ง
รัน composer ที่ root ไดเร็กทอรีของ Laravel

```bash
composer require zenepay/filament-buddhist-date-picker
```

## การใช้งาน
### 1. กรณีต้องการให้ทุกภาษา เป็น พ.ศ. 
```php

\Filament\Forms\Components\DatePicker::make('start_date')->buddhist();
\Filament\Forms\Components\DatePicker::make('start_date')->buddhist();

```
### 2. กรณีให้ทุกภาษา เป็น ค.ศ ซึ่งจะรองรับ ภาษาไทย ด้วย
```php
\Filament\Forms\Components\DatePicker::make('start_at')->buddhist(false);
\Filament\Forms\Components\DatetimePicker::make('start_at')->buddhist(false);
```
### 2. กรณีให้บางภาษา เป็น เป็น พ.ศ นอกนั้นให้เป็น ค.ศ
```php

\Filament\Forms\Components\DatePicker::make('birth_date')->buddhist(onlyLocales:['th','en']);
\Filament\Forms\Components\DateTimePicker::make('birth_date')->buddhist(onlyLocales:['th','en']);

```
### 3. กรณีใช้ชื่อย่อแทนวัน เช่น อ. จ อ พ พฤ ศ ส 
ให้เซ็ต weekdaysMin เป็น true  หรือให้เป็นแบบสั้น อาทิตย์ จันทร์ อังคาร ให้เซ็ต เป็น false 
```php

\Filament\Forms\Components\DatePicker::make('start_at')->buddhist(onlyLocales:['th','en'],weekdaysMin:true);
\Filament\Forms\Components\DatetimePicker::make('start_at')->buddhist(onlyLocales:['th','en'],weekdaysMin:true);
```
หรือใช้แบบ เป็น component ใหม่แทนเลย ก็ใช้แบบนี้ได้
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
