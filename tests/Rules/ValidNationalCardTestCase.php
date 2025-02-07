<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidNationalCard;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidNationalCardTestCase extends TestCase
{
    /**
     * Test national code is valid.
     *
     * @test
     *
     * @return void
     */
    public function test_national_code_is_valid()
    {
        $rules = ['national_card' => [new ValidNationalCard]];
        $data = ['national_card' => '0151016437'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test national code is not valid.
     *
     * @test
     *
     * @return void
     */
    public function test_national_code_is_not_valid()
    {
        $rules = ['national_card' => [new ValidNationalCard]];

        $validator = $this->app['validator']->make(['national_card' => '0151016438'], $rules)->passes();
        $this->assertFalse($validator);

        $validator = $this->app['validator']->make(['national_card' => '101010'], $rules)->passes();
        $this->assertFalse($validator);
    }
}
