<?php

namespace MichaelRubel\ValueObjects\Tests;

use MichaelRubel\ValueObjects\ValueObjectServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ValueObjectServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('testing');
    }
}
