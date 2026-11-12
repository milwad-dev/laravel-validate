<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;
use Milwad\LaravelValidate\Rules\ValidEthereumAddress;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidEthereumAddressTest extends TestCase
{
    /**
     * EIP-55 checksummed addresses from the specification.
     */
    private const CHECKSUMMED = [
        '0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAed',
        '0xfB6916095ca1df60bB79Ce92cE3Ea74c37c5d359',
        '0xdbF03B407c01E7cD3CBea99509d93f8DDDC8C6FB',
        '0xD1220A0cf47c7B9Be7A2E6BA89F429762e7b9aDb',
    ];

    /**
     * Test checksummed ethereum addresses are valid.
     */
    public function test_checksummed_ethereum_address_is_valid()
    {
        foreach (self::CHECKSUMMED as $address) {
            $this->assertTrue($this->validate($address), "Expected '$address' to be valid.");
            $this->assertTrue($this->validate($address, true), "Expected '$address' to be valid in strict mode.");
        }
    }

    /**
     * Test single-case ethereum addresses are valid unless strict.
     */
    public function test_single_case_ethereum_address_is_valid_unless_strict()
    {
        $lower = '0x5aaeb6053f3e94c9b9a09f33669435e7ef1beaed';
        $upper = '0x5AAEB6053F3E94C9B9A09F33669435E7EF1BEAED';

        $this->assertTrue($this->validate($lower));
        $this->assertTrue($this->validate($upper));
        $this->assertFalse($this->validate($lower, true));
        $this->assertFalse($this->validate($upper, true));
    }

    /**
     * Test ethereum address is not valid.
     */
    public function test_ethereum_address_is_not_valid()
    {
        $invalid = [
            '0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAeD', // wrong checksum (last letter case flipped)
            '0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeA',   // too short
            '0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAed00', // too long
            '5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAed',   // missing 0x
            '0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAeg', // non-hex character
            "0x5aaeb6053f3e94c9b9a09f33669435e7ef1beaed\n", // trailing newline
            'loremipsum',
        ];

        foreach ($invalid as $address) {
            $this->assertFalse($this->validate($address), "Expected '$address' to be invalid.");
        }
    }

    /**
     * Test ethereum address rule as a string rule when using container.
     */
    public function test_ethereum_address_as_string_rule()
    {
        config(['laravel-validate.using_container' => true]);
        (new LaravelValidateServiceProvider($this->app))->boot();

        $lower = '0x5aaeb6053f3e94c9b9a09f33669435e7ef1beaed';

        $this->assertTrue($this->app['validator']->make(['address' => $lower], ['address' => 'ValidEthereumAddress'])->passes());
        $this->assertFalse($this->app['validator']->make(['address' => $lower], ['address' => 'ValidEthereumAddress:strict'])->passes());
        $this->assertTrue($this->app['validator']->make(['address' => self::CHECKSUMMED[0]], ['address' => 'ValidEthereumAddress:strict'])->passes());
    }

    private function validate(string $address, bool $strict = false): bool
    {
        return $this->app['validator']
            ->make(['address' => $address], ['address' => [new ValidEthereumAddress($strict)]])
            ->passes();
    }
}
