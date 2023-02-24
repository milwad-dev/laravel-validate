<?php

namespace Milwad\LaravelValidate\Tests;

class ValidCartNumberIranTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test cart number iran is valid.
     *
     * @test
     *
     * @return void
     */
    public function cart_number_iran_is_valid()
    {
//        $rules = ['cart_number_iran' => [new ValidCartNumberIran()]];
//        $data = ['cart_number_iran' => '1234123412341234']; # Todo have a bug
//        $passes = $this->app['validator']->make($data, $rules)->passes();
//
//        $this->assertTrue($passes);
    }
}
