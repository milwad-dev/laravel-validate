<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidStrongPassword;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidStrongPasswordTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test password is strong.
     *
     * @test
     *
     * @return void
     */
    public function password_is_strong()
    {
        $rules = ['strong_password' => [new ValidStrongPassword]];
        $data = ['strong_password' => 'Milwad123!'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test password is not strong.
     *
     * @test
     *
     * @return void
     */
    public function password_is_not_strong()
    {
        $rules = ['strong_password' => [new ValidStrongPassword]];
        $data = ['strong_password' => 'Milwad123'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
