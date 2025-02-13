<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidOddNumber;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidOddNumberTest extends TestCase
{
    /**
     * Test number is odd.
     */
    public function test_number_is_odd()
    {
        $rules = ['hashtag' => [new ValidOddNumber]];
        $data = ['hashtag' => '1025'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test number is not odd.
     */
    public function test_number_is_not_odd()
    {
        $rules = ['hashtag' => [new ValidOddNumber]];
        $data = ['hashtag' => '1024'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test float number is odd.
     *
     * @test
     *
     * @return void
     */
    public function check_float_number_is_odd()
    {
        $rules = ['odd_number' => [new ValidOddNumber]];
        $data = ['odd_number' => '753.00'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test float number is not odd.
     *
     * @test
     *
     * @return void
     */
    public function check_float_number_is_not_odd()
    {
        $rules = ['odd_number' => [new ValidOddNumber]];
        $data = ['odd_number' => '333.14'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test non-numeric values.
     *
     * @test
     *
     * @return void
     */
    public function check_non_numeric_values()
    {
        $rules = ['odd_number' => [new ValidOddNumber]];
        $data = ['odd_number' => 'abc'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
