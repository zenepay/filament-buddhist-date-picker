<?php

namespace Tests;

use Illuminate\Foundation\Application;
//use PHPUnit\Framework\TestCase as BaseTestCase;
use Zenepay\FilamentBuddhistDatePicker\BuddhistDatePickerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            BuddhistDatePickerServiceProvider::class,
        ];
    }

    public function setApp(Application $app)
    {

        return $this;
    }
}
