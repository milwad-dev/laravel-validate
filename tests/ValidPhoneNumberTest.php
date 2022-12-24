<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidPhoneNumber;

class ValidPhoneNumberTest extends BaseTest
{
    /**
     * Set up.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test phone number is valid.
     *
     * @test
     * @return void
     */
    public function phone_number_is_valid()
    {
        $rules = ['phone_number' => [new ValidPhoneNumber()]];
        $data = ['phone_number' => '09366000000'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
