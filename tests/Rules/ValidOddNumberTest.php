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
}
