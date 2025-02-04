<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidSnakeCase;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidSnakeCaseTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test snake case is valid.
     *
     * @test
     *
     * @return void
     */
    public function snake_case_is_valid()
    {
        $rules = ['snake_case' => [new ValidSnakeCase]];
        $data = ['snake_case' => 'milwad_dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test snake case is not valid.
     *
     * @test
     *
     * @return void
     */
    public function snake_case_is_not_valid()
    {
        $rules = ['snake_case' => [new ValidSnakeCase]];
        $data = ['snake_case' => 'milwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
