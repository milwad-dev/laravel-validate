<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIranPlate;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidIranPlateTest extends TestCase
{
    /**
     * Test Iran License Plate Validator.
     */
    public function test_iran_plate_is_valid()
    {
        $rules = ['iran_plate' => [new ValidIranPlate]];
        $data = ['iran_plate' => '32 ی 321 ایران 11'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test Iran License Plate is not valid.
     */
    public function test_iran_plate_is_not_valid()
    {
        $rules = ['iran_plate' => [new ValidIranPlate]];
        $data = ['iran_plate' => '12 ب 345 ترکیه 67'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
