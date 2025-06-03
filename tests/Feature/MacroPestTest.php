<?php

use function Pest\Livewire\livewire;

use Filament\Forms\Components\DatePicker;

it("has method buddhist", function () {
    expect(DatePicker::make('date')->buddhist()->default('9/05/2024'))->toBeInstanceOf(DatePicker::class);
});
