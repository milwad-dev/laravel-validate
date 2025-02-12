<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCapitalCharWithNumber;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidCapitalCharWithNumberTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test capital char with number is valid.
     *
     * @test
     *
     * @return void
     */
    public function capital_char_with_number_is_valid()
    {
        $rules = ['capital_char_with_number' => [new ValidCapitalCharWithNumber]];
        $data = ['capital_char_with_number' => 'MILWAD-84'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test capital char with number is not valid.
     *
     * @test
     *
     * @return void
     */
    public function capital_char_with_number_is_not_valid()
    {
        $rules = ['capital_char_with_number' => [new ValidCapitalCharWithNumber]];
        $data = ['capital_char_with_number' => 'Milwad-84'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
