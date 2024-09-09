<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIpAddressIPV6;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidIpAddressIPV6Test extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test ipv6 address is valid.
     *
     * @test
     *
     * @return void
     */
    public function ipv6_address_is_valid()
    {
        $rules = ['ipv6_address' => [new ValidIpAddressIPV6]];
        $data = ['ipv6_address' => '2001:db8:3333:4444:5555:6666:7777:8888'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test ipv6 address is not valid.
     *
     * @test
     *
     * @return void
     */
    public function ipv6_address_is_not_valid()
    {
        $rules = ['ipv6_address' => [new ValidIpAddressIPV6]];
        $data = ['ipv6_address' => '12345671213145131212'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
