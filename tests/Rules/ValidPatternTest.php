<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidPattern;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidPatternTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test pattern is valid.
     *
     * @test
     *
     * @return void
     */
    public function pattern_is_valid()
    {
        $rules = ['numbers' => [new ValidPattern(4)]];
        $data = ['numbers' => '4444-4444-4444'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test pattern is not valid.
     *
     * @test
     *
     * @return void
     */
    public function pattern_is_not_valid()
    {
        $rules = ['numbers' => [new ValidPattern(4)]];
        $data = ['numbers' => '44444-4444-44444'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
