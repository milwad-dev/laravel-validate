<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Milwad\LaravelValidate\Utils\Keccak;

class ValidEthereumAddress implements Rule
{
    /**
     * Whether the address must be EIP-55 checksummed.
     */
    protected bool $strict;

    /**
     * @param  bool|array  $strict  When true, all-lowercase and all-uppercase addresses are rejected.
     *                              An array is accepted for string rules, e.g. 'ValidEthereumAddress:strict'.
     */
    public function __construct(bool|array $strict = false)
    {
        $this->strict = is_array($strict) ? in_array('strict', $strict, true) : $strict;
    }

    /**
     * Check ethereum address is valid.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value) || ! preg_match('/^0x[0-9a-fA-F]{40}$/', $value)) {
            return false;
        }

        $address = substr($value, 2);
        $isSingleCase = $address === strtolower($address) || $address === strtoupper($address);

        // Single-case addresses carry no checksum (EIP-55), so they are accepted unless strict.
        if ($isSingleCase && ! $this->strict) {
            return true;
        }

        return $this->hasValidChecksum($address);
    }

    /**
     * Check the EIP-55 mixed-case checksum.
     */
    protected function hasValidChecksum(string $address): bool
    {
        $hash = Keccak::hash256(strtolower($address));

        for ($i = 0; $i < 40; $i++) {
            if (ctype_digit($address[$i])) {
                continue;
            }

            $shouldBeUpper = hexdec($hash[$i]) >= 8;

            if ($shouldBeUpper !== ctype_upper($address[$i])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.ethereum-address');
    }
}
