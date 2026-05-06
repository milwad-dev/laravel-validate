<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidLatitude;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidLatitudeTest extends TestCase
{
    /**
     * Test latitude is valid.
     */
    public function test_latitude_is_valid(): void
    {
        $rules = ['latitude' => [new ValidLatitude]];

        $latitudes = [
            50.1109,
            52.5200,
            40.7128,
        ];

        foreach ($latitudes as $latitude) {
            $data = ['latitude' => $latitude];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertTrue($passes);
        }
    }

    /**
     * Test latitude is not valid.
     */
    public function test_latitude_is_not_valid(): void
    {
        $rules = ['latitude' => [new ValidLatitude]];

        $latitudes = [
            90.0001,
            -90.0001,
        ];

        foreach ($latitudes as $latitude) {
            $data = ['latitude' => $latitude];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertFalse($passes);
        }
    }
}
