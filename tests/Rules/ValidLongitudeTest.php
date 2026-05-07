<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidLongitude;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidLongitudeTest extends TestCase
{
    /**
     * Test longitude is valid.
     */
    public function test_longitude_is_valid(): void
    {
        $rules = ['longitude' => [new ValidLongitude]];

        $longitudes = [
            51.377225156511855,
            -120.28544719333155,
            -108.09969116773564,
        ];

        foreach ($longitudes as $longitude) {
            $data = ['longitude' => $longitude];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertTrue($passes);
        }
    }

    /**
     * Test longitude is not valid.
     */
    public function test_longitude_is_not_valid(): void
    {
        $rules = ['longitude' => [new ValidLongitude]];

        $longitudes = [
            181.0001,
            360.02501,
            999,
            -999,
        ];

        foreach ($longitudes as $longitude) {
            $data = ['longitude' => $longitude];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertFalse($passes);
        }
    }
}
