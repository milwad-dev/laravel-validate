<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidBase64;
use Milwad\LaravelValidate\Rules\ValidPattern;

class ValidPatternTest extends BaseTest
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
     * Test pattern is valid.
     *
     * @test
     * @return void
     */
    public function pattern_is_valid()
    {
        $rules = ['numbers' => [new ValidPattern(4)]];
        $data  = ['numbers' => '4444-4444-4444'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test pattern is not valid.
     *
     * @test
     * @return void
     */
    public function pattern_is_not_valid()
    {
        $rules = ['numbers' => [new ValidPattern(4)]];
        $data  = ['numbers' => '44444-4444-44444'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}