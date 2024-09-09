<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIranPostalCode;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidIranPostalCodeTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test postal code is valid.
     *
     * @test
     *
     * @return void
     */
    public function postal_code_is_valid()
    {
        $rules = ['postal_code' => [new ValidIranPostalCode]];
        $data = ['postal_code' => '3354355599'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test postal code is not valid.
     *
     * @test
     *
     * @return void
     */
    public function postal_code_is_not_valid()
    {
        $rules = ['postal_code' => [new ValidIranPostalCode]];
        $data = ['postal_code' => '1111111111'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
