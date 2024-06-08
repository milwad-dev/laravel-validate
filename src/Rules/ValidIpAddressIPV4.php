<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidIpAddressIPV4 implements Rule
{
    /**
     * Check ip address (ipv4) is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/(?:\b25[0-5]|\b2[0-4][0-9]|\b[01]?[0-9][0-9]?)(?:\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.ipv4');
    }
}
