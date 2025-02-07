<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidOddNumber;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidOddNumberTestCase extends TestCase
{
    /**
     * Test number is odd.
     *
     * @test
     *
     * @return void
     */
    public function number_is_odd()
    {
        $rules = ['hashtag' => [new ValidOddNumber]];
        $data = ['hashtag' => '1025'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test number is not odd.
     *
     * @test
     *
     * @return void
     */
    public function number_is_not_odd()
    {
        $rules = ['hashtag' => [new ValidOddNumber]];
        $data = ['hashtag' => '1024'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
