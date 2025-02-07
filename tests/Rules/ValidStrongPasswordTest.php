<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidStrongPassword;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidStrongPasswordTest extends TestCase
{
    /**
     * Test password is strong.
     */
    public function test_password_is_strong()
    {
        $rules = ['strong_password' => [new ValidStrongPassword]];
        $data = ['strong_password' => 'Milwad123!'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test password is not strong.
     */
    public function test_password_is_not_strong()
    {
        $rules = ['strong_password' => [new ValidStrongPassword]];
        $data = ['strong_password' => 'Milwad123'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
