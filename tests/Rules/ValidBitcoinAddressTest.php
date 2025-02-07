<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidBitcoinAddress;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidBitcoinAddressTest extends TestCase
{
    /**
     * Test bitcoin address is valid.
     */
    public function test_bitcoin_address_is_valid()
    {
        $rules = ['bitcoin_address' => [new ValidBitcoinAddress]];
        $data = ['bitcoin_address' => '1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test bitcoin address is not valid.
     */
    public function test_bitcoin_address_is_not_valid()
    {
        $rules = ['bitcoin_address' => [new ValidBitcoinAddress]];
        $data = ['bitcoin_address' => 'loremipsum'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
