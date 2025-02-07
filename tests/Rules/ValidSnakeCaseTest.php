<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidSnakeCase;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidSnakeCaseTest extends TestCase
{
    /**
     * Test snake case is valid.
     */
    public function test_snake_case_is_valid()
    {
        $rules = ['snake_case' => [new ValidSnakeCase]];
        $data = ['snake_case' => 'milwad_dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test snake case is not valid.
     */
    public function test_snake_case_is_not_valid()
    {
        $rules = ['snake_case' => [new ValidSnakeCase]];
        $data = ['snake_case' => 'milwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
