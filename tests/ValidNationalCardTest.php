<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidNationalCard;

class ValidNationalCardTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test national code is valid.
     *
     * @test
     *
     * @return void
     */
    public function national_code_is_valid()
    {
        $rules = ['national_card' => [new ValidNationalCard()]];

        $validator = $this->app['validator']->make(['national_card' => '0151016437'], $rules);
        $this->assertTrue($validator->passes());
    }

    /**
     * Test national code is not valid.
     *
     * @test
     *
     * @return void
     */
    public function national_code_is_not_valid()
    {
        $rules = ['national_card' => [new ValidNationalCard()]];

        $validator = $this->app['validator']->make(['national_card' => '0151016438'], $rules);
        $this->assertFalse($validator->passes());

        $validator = $this->app['validator']->make(['national_card' => '101010'], $rules);
        $this->assertFalse($validator->passes());
    }
}
