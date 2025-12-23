<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;
use Milwad\LaravelValidate\Tests\Traits\AssertionsTrait;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use AssertionsTrait;

    /**
     * Get package providers.
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelValidateServiceProvider::class,
        ];
    }
}
