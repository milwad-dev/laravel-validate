<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPattern;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidPatternTestCase extends TestCase
{
    /**
     * Test pattern is valid.
     *
     * @test
     *
     * @return void
     */
    public function test_pattern_is_valid()
    {
        $rules = ['numbers' => [new ValidPattern(4)]];
        $data = ['numbers' => '4444-4444-4444'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test pattern is not valid.
     *
     * @test
     *
     * @return void
     */
    public function test_pattern_is_not_valid()
    {
        $rules = ['numbers' => [new ValidPattern(4)]];
        $data = ['numbers' => '44444-4444-44444'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
