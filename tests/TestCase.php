<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Uicklv\LaravelMonobank\Providers\MonobankServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            MonobankServiceProvider::class,
        ];
    }
}
