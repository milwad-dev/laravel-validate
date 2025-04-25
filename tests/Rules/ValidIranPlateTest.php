<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIranPlate;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidIranPlateTest extends TestCase
{
    /**
     * Test iran license plate is valid.
     */
    public function test_iran_plate_is_valid()
    {
        $rules = ['car_number' => [new ValidIranPlate]];
        $data = ['car_number' => '32 ی 321 ایران 45'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test iran license plate is not valid.
     */
    public function test_iran_plate_is_not_valid()
    {
        $rules = ['car_number' => [new ValidIranPlate]];
        $data = ['car_number' => '32 ی 321 ترکیه 45'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
