<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidCarNumber;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidCarNumberTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test car number is valid.
     *
     * @test
     *
     * @return void
     */
    public function car_number_is_valid()
    {
        $rules = ['car_number' => [new ValidCarNumber()]];
        $data = ['car_number' => 'KA01AB1234'];
        $passes = Validator::make($data, $rules)->passes();
        $this->assertTrue($passes);
    }

    /**
     * Test car number is not valid.
     *
     * @test
     *
     * @return void
     */
    public function car_number_is_not_valid()
    {
        $rules = ['car_number' => [new ValidCarNumber()]];
        $data = ['car_number' => '854128'];
        $passes = Validator::make($data, $rules)->passes();
        $this->assertFalse($passes);
    }
}
