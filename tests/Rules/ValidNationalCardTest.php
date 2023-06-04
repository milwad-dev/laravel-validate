<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidNationalCard;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidNationalCardTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test national code is valid.
     *
     * @test
     *
     * @return void
     */
    public function national_code_is_valid()
    {
        $rules = ['national_card' => [new ValidNationalCard()]];
        $data = ['national_card' => '0151016437'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test national code is not valid.
     *
     * @test
     *
     * @return void
     */
    public function national_code_is_not_valid()
    {
        $rules = ['national_card' => [new ValidNationalCard()]];

        $validator = Validator::make(['national_card' => '0151016438'], $rules)->passes();
        $this->assertFalse($validator);

        $validator = Validator::make(['national_card' => '101010'], $rules)->passes();
        $this->assertFalse($validator);
    }
}
