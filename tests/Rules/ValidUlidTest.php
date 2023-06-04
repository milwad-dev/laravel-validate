<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidUlid;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidUlidTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test ulid is valid.
     *
     * @test
     *
     * @return void
     */
    public function ulid_is_valid()
    {
        $rules = ['ulid' => [new ValidUlid()]];
        $data = ['ulid' => '01ARZ3NDEKTSV4RRFFQ69G5FAV'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test ulid is not valid.
     *
     * @test
     *
     * @return void
     */
    public function ulid_is_not_valid()
    {
        $rules = ['ulid' => [new ValidUlid()]];
        $data = ['ulid' => '01ARZ3NDEKTSV4RRFFQ69G5FA'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
