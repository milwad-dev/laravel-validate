<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidLatitude implements Rule
{
    /**
     * Check base64.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_numeric($value)) {
            return false;
        }

        $value = (float) $value;

        return $value >= -90 && $value <= 90;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.latitude');
    }
}
