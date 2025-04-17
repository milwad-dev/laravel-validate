<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use BadMethodCallException;
use Milwad\LaravelValidate\Rules\ValidLandlineNumber;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Utils\Country;

class ValidLandlineNumberTest extends TestCase
{
    /**
     * Test landline number is valid.
     */
    public function test_landline_number_is_valid()
    {
        $rules = [
            'landline_number' => [new ValidLandlineNumber],
            'landline_de' => [new ValidLandlineNumber(Country::GERMANY)],
        ];
        $data = [
            'landline_number' => '+98212223343',
            'landline_de' => '+49301234567',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test landline number is not valid.
     */
    public function test_landline_number_is_not_valid()
    {
        $rules = [
            'landline_number' => [new ValidLandlineNumber],
            'landline_ir' => [new ValidLandlineNumber(Country::IRAN)],
        ];
        $data = [
            'landline_number' => '123456789',
            'landline_ir' => '09120000000',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test all landline number is valid by specific code.
     */
    public function test_all_landline_number_is_valid_by_specific_code()
    {
        $rules = [
            'landline_ir' => [new ValidLandlineNumber(Country::IRAN)],
            'landline_de' => [new ValidLandlineNumber(Country::GERMANY)],
        ];
        $data = [
            'landline_ir' => '02132223343',
            'landline_de' => '+49301234567',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test if landline number validate method is not exists, will be thrown an exception.
     */
    public function test_if_landline_number_validate_method_is_not_exists()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage("Validator method for 'AZ' does not exist.");

        $rules = ['landline' => [new ValidLandlineNumber(Country::AZERBAIJAN)]];
        $data = ['landline' => '+62812345678'];

        $this->app['validator']->make($data, $rules)->passes();
    }
}
