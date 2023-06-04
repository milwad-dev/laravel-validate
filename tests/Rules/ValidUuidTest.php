<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidUuid;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidUuidTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test uuid is valid.
     *
     * @test
     *
     * @return void
     */
    public function uuid_is_valid()
    {
        $rules = ['uuid' => [new ValidUuid()]];
        $data = ['uuid' => '123e4567-e89b-12d3-a456-426655440000'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test uuid is not valid.
     *
     * @test
     *
     * @return void
     */
    public function uuid_is_not_valid()
    {
        $rules = ['uuid' => [new ValidUuid()]];
        $data = ['uuid' => '5050'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
