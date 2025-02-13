<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidEvenNumber;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidEvenNumberTest extends TestCase
{
    /**
     * Test number is even.
     */
    public function test_check_number_is_even()
    {
        $rules = ['even_number' => [new ValidEvenNumber]];
        $data = ['even_number' => '1024'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test number is not even.
     */
    public function test_check_number_is_not_even()
    {
        $rules = ['even_number' => [new ValidEvenNumber]];
        $data = ['even_number' => '1025'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test float number is even.
     *
     * @test
     *
     * @return void
     */
    public function check_float_number_is_even()
    {
        $rules = ['even_number' => [new ValidEvenNumber]];
        $data = ['even_number' => '754.00'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test float number is not even.
     *
     * @test
     *
     * @return void
     */
    public function check_float_number_is_not_even()
    {
        $rules = ['even_number' => [new ValidEvenNumber]];
        $data = ['even_number' => '333.13'];
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
        $rules = ['even_number' => [new ValidEvenNumber]];
        $data = ['even_number' => 'abc'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
