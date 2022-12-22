<?php

namespace Milwad\LaravelValidate\Tests;

use Illuminate\Foundation\Testing\TestCase;
use Milwad\LaravelValidate\Rules\ValidBitcoinAddress;

class ValidBitcoinAddressTest extends TestCase
{
    /**
     * Test bitcoin address is valid.
     *
     * @test
     * @return void
     */
    public function bitcoin_address_is_valid()
    {
        $this->withoutExceptionHandling();
        $rules = [
            'bitcoin_address' => [new ValidBitcoinAddress()]
        ];

        $data = [
            'bitcoin_address' => '1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY'
        ];

        $passes = $this->app['validator']->make($data, $rules)->passes();
        $this->assertTrue($passes);
    }

    public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}
