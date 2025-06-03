<?php

namespace Zenepay\FilamentBuddhistDatePicker\Tests\Unit;

use Filament\Forms\Components\DatePicker;
use PHPUnit\Event\Code\Test;
use Tests\TestCase;

class MacroTest extends TestCase
{

    /** @test */
    public function it_has_method_buddhist()
    {
        $date  = DatePicker::make('date');
        $this->assertNotNull($date->buddhist());
        $this->assertInstanceOf(DatePicker::class, $date->buddhist());
        $this->assertArrayHasKey('onlyLocales', $date->buddhist()->getExtraAttributes());
        $this->assertEquals('th', DatePicker::make('date')->buddhist(['th'])->getExtraAttributes()['onlyLocales']);
    }
}
