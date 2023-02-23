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
        $data  = ['numbers' => '4444-4444-4444']; // milwad
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test base64 is not valid.
     *
     * @test
     * @return void
     */
    public function base64_is_not_valid()
    {
        $rules = ['base64' => [new ValidBase64()]];
        $data = ['base64' => 'milwad'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}