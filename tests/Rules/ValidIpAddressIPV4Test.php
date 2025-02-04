<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIpAddressIPV4;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidIpAddressIPV4Test extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test ipv4 address is valid.
     *
     * @test
     *
     * @return void
     */
    public function ipv4_address_is_valid()
    {
        $rules = ['ipv4_address' => [new ValidIpAddressIPV4]];
        $data = ['ipv4_address' => '129.144.50.56'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test ipv4 address is not valid.
     *
     * @test
     *
     * @return void
     */
    public function ipv4_address_is_not_valid()
    {
        $rules = ['ipv4_address' => [new ValidIpAddressIPV4]];
        $data = ['ipv4_address' => '123456789'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
