<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidSlashEndOfString;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidSlashEndOfStringTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test slash end of string is valid.
     *
     * @test
     *
     * @return void
     */
    public function slash_end_of_string_is_valid()
    {
        $rules = ['slash_string' => [new ValidSlashEndOfString]];
        $data = ['slash_string' => 'milwad/'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test slash end of string is not valid.
     *
     * @test
     *
     * @return void
     */
    public function slash_end_of_string_is_not_valid()
    {
        $rules = ['slash_string' => [new ValidSlashEndOfString]];
        $data = ['slash_string' => 'milwad'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
