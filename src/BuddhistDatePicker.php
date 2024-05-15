<?php

namespace ZenEpay\FilamentBhuddistDatePicker;

use Filament\Forms\Components\DateTimePicker;

class BuddistDatePicker extends DateTimePicker
{
    protected string $view = 'filament-buddisht-date-picker::date-time-picker';
    public function hasTime(): bool
    {
        return false;
    }

    public function onlyLocales(array $onlyLocales = []): static
    {
        $this->extraTriggerAttributes['onlyLocales'] = $onlyLocales;
        return $this;
    }

    public function weekdaysMin(bool $weekdaysMin = true): static
    {
        $this->extraTriggerAttributes['weekdaysMin'] = $weekdaysMin;
        return $this;
    }
}
