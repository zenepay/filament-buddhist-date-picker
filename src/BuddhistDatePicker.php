<?php

namespace Zenepay\FilamentBuddhistDatePicker;

use Closure;
use Filament\Forms\Components\DateTimePicker;

class BuddhistDatePicker extends DateTimePicker
{
    protected string $view = 'filament-buddisht-date-picker::date-time-picker';
    private bool|string $onlyLocales = true;
    private bool $weekdaysMin = true;
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
            'onlyLocales' => (int) $this->onlyLocales
        ], true);
    }

    public function onlyLocales(array $onlyLocales = []): static
    {
        $this->onlyLocales = is_array($onlyLocales) ? implode(',', $onlyLocales) : (is_bool($onlyLocales) ? (int) $onlyLocales : $onlyLocales);
        $this->extraAttributes(['onlyLocales' => $this->onlyLocales, 'weekdaysMin' => (int) $this->weekdaysMin], false);
        return $this;
    }

    public function weekdaysMin(bool $weekdaysMin = true): static
    {
        $this->weekdaysMin = $weekdaysMin;
        $onlyLocales = $this->onlyLocales;
        $this->extraAttributes(['weekdaysMin' => (int) $this->weekdaysMin, 'onlyLocales' => $this->onlyLocales], false);
        return $this;
    }
}
