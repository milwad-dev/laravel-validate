<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidUsername;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidUsernameTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test username is valid.
     *
     * @test
     *
     * @return void
     */
    public function username_is_valid()
    {
        $rules = ['username' => [new ValidUsername()]];
        $data = ['username' => 'milwad'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test username is not valid.
     *
     * @test
     *
     * @return void
     */
    public function username_is_not_valid()
    {
        $rules = ['username' => [new ValidUsername()]];
        $data = ['username' => 'milwad!@!'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
