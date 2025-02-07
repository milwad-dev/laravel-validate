<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCartNumberIran;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidCartNumberIranTest extends TestCase
{
    /**
     * Test cart number iran is valid.
     */
    public function test_cart_number_iran_is_valid()
    {
        $rules = ['cart_number_iran' => [new ValidCartNumberIran]];
        $data = ['cart_number_iran' => '6280231331655562'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test cart number iran is invalid.
     */
    public function test_cart_number_iran_is_invalid()
    {
        $rules = ['cart_number_iran' => [new ValidCartNumberIran]];
        $data = ['cart_number_iran' => '1234123412341234'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
