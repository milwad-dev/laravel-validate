<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidKebabCase;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidKebabCaseTest extends TestCase
{
    /**
     * Test kebab case is valid.
     */
    public function test_kebab_case_is_valid()
    {
        $rules = ['kebab-case' => [new ValidKebabCase]];
        $data = ['kebab-case' => 'milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test kebab case is not valid.
     */
    public function test_kebab_case_is_not_valid()
    {
        $rules = ['kebab-case' => [new ValidKebabCase]];
        $data = ['kebab-case' => 'milwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
