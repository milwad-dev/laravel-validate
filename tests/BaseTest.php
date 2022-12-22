<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;

class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<int, string>
     */
    protected function getPackageProviders($app)
    {
        return [
            LaravelValidateServiceProvider::class
        ];
    }
}