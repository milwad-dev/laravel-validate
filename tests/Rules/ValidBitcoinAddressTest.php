<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidBitcoinAddress;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidBitcoinAddressTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test bitcoin address is valid.
     *
     * @test
     *
     * @return void
     */
    public function bitcoin_address_is_valid()
    {
        $rules = ['bitcoin_address' => [new ValidBitcoinAddress]];
        $data = ['bitcoin_address' => '1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test bitcoin address is not valid.
     *
     * @test
     *
     * @return void
     */
    public function bitcoin_address_is_not_valid()
    {
        $rules = ['bitcoin_address' => [new ValidBitcoinAddress]];
        $data = ['bitcoin_address' => 'loremipsum'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
