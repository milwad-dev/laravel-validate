<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPascalCase;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidPascalCaseTest extends TestCase
{
    /**
     * Test pascal-case is valid.
     */
    public function test_pascal_case_is_valid()
    {
        $rules = ['pascal-case' => [new ValidPascalCase]];
        $data = ['pascal-case' => 'MilwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test pascal-case is not valid.
     */
    public function test_pascal_case_is_not_valid()
    {
        $rules = ['pascal-case' => [new ValidPascalCase]];
        $data = ['pascal-case' => 'milwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
