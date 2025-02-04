<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCreditCard;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidCreditCardTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test credit card number is valid.
     *
     * @test
     *
     * @return void
     */
    public function credit_card_is_valid()
    {
        $rules = ['credit_card' => [new ValidCreditCard]];
        $data = ['credit_card' => '4111111111111111']; // A sample valid credit card number
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test credit card number is not valid.
     *
     * @test
     *
     * @return void
     */
    public function credit_card_is_not_valid()
    {
        $rules = ['credit_card' => [new ValidCreditCard]];
        $data = ['credit_card' => '1234567812345678']; // A sample invalid credit card number
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
