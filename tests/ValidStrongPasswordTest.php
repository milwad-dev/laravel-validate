<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidStrongPassword;

class ValidStrongPasswordTest extends BaseTest
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
     * Test password is strong.
     *
     * @test
     * @return void
     */
    public function password_is_strong()
    {
        $rules = ['strong_password' => [new ValidStrongPassword()]];
        $data = ['strong_password' => 'Milwad123!'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
