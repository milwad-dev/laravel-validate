<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDuplicate;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidDuplicateTest extends TestCase
{
    /**
     * Test duplicate number is valid.
     */
    public function test_duplicate_number_is_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate]];
        $data = ['duplicate' => 123456];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test duplicate number is not valid.
     */
    public function test_duplicate_number_is_not_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate]];
        $data = ['duplicate' => 1123456];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test duplicate string is valid.
     */
    public function test_duplicate_string_is_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate]];
        $data = ['duplicate' => 'milwad'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test duplicate string is not valid.
     */
    public function test_duplicate_string_is_not_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate]];
        $data = ['duplicate' => 'millwad'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
