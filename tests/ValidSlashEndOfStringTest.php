<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidSlashEndOfString;

class ValidSlashEndOfStringTest extends BaseTest
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
     * Test slash end of string is valid.
     *
     * @test
     * @return void
     */
    public function slash_end_of_string()
    {
        $rules = ['slash_string' => [new ValidSlashEndOfString()]];
        $data = ['slash_string' => 'milwad/'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
