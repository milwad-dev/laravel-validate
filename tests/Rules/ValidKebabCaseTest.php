<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidKebabCase;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidKebabCaseTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test kebab case is valid.
     *
     * @test
     *
     * @return void
     */
    public function kebab_case_is_valid()
    {
        $rules = ['kebab-case' => [new ValidKebabCase]];
        $data = ['kebab-case' => 'milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test kebab case is not valid.
     *
     * @test
     *
     * @return void
     */
    public function kebab_case_is_not_valid()
    {
        $rules = ['kebab-case' => [new ValidKebabCase]];
        $data = ['kebab-case' => 'milwadDev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
