<?php

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Zenepay\FilamentBuddhistDatePicker\BuddhistDatePickerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    //use CreatesApplication;
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
