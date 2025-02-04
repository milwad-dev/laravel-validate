<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCamelCase;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidCamelCaseTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test camel case is valid.
     *
     * @test
     *
     * @return void
     */
    public function camel_case_is_valid()
    {
        $rules = ['camel_case' => [new ValidCamelCase]];
        $data = ['camel_case' => 'milwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test camel case is not valid.
     *
     * @test
     *
     * @return void
     */
    public function camel_case_is_not_valid()
    {
        $rules = ['camel_case' => [new ValidCamelCase]];
        $data = ['camel_case' => 'milwad_dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
