<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPascalCase;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidPascalCaseTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test pascal-case is valid.
     *
     * @test
     *
     * @return void
     */
    public function pascal_case_is_valid()
    {
        $rules = ['pascal-case' => [new ValidPascalCase]];
        $data = ['pascal-case' => 'MilwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test pascal-case is not valid.
     *
     * @test
     *
     * @return void
     */
    public function pascal_case_is_not_valid()
    {
        $rules = ['pascal-case' => [new ValidPascalCase]];
        $data = ['pascal-case' => 'milwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
