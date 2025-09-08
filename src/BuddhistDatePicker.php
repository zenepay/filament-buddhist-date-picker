<?php

namespace Zenepay\FilamentBuddhistDatePicker;

use Closure;
use DateTime;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;

class BuddhistDatePicker extends DateTimePicker
{
    protected string $view = 'filament-buddisht-date-picker::date-time-picker';

    private bool|string $onlyLocales = true;

    private bool $weekdaysMin = true;

    protected string | Closure $defaultDateDisplayFormat = 'd/m/Y';

    public function hasTime(): bool
    {
        return false;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->native(false);
        $this->extraAttributes([
            'weekdaysMin' => (int) $this->weekdaysMin,
            'onlyLocales' => (int) $this->onlyLocales,
            'hourMode' => 24,
        ], true);
        $this->suffixIcon('heroicon-o-calendar', isInline: true);
    }

    public function onlyLocales(array $onlyLocales = []): static
    {
        $this->onlyLocales = is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales);
        $this->extraAttributes(['onlyLocales' => $this->onlyLocales, 'weekdaysMin' => (int) $this->weekdaysMin, 'hourMode' => 24], false);
        return $this;
    }

    public function weekdaysMin(bool $weekdaysMin = true): static
    {
        $this->weekdaysMin = $weekdaysMin;
        $this->extraAttributes(['weekdaysMin' => (int) $this->weekdaysMin, 'onlyLocales' => $this->onlyLocales, 'hourMode' => 24], false);
        return $this;
    }
}
