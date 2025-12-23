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
        $this->assertValidationPasses(
            data: ['even_number' => '1024'],
            rules: static::getRule()
        );
    }

    /**
     * Test number is not even.
     */
    public function test_check_number_is_not_even()
    {
        $this->assertValidationFails(
            data: ['even_number' => '1025'],
            rules: static::getRule()
        );
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
        $this->assertValidationPasses(
            data: ['even_number' => '754.00'],
            rules: static::getRule()
        );
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
        $this->assertValidationFails(
            data: ['even_number' => '333.13'],
            rules: static::getRule()
        );
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
        $this->assertValidationFails(
            data: ['even_number' => 'abc'],
            rules: static::getRule()
        );
    }

    private static function getRule(): array
    {
        return ['even_number' => [new ValidEvenNumber]];
    }
}
