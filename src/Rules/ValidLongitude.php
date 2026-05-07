<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidLongitude implements Rule
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

        return $value >= -180 && $value <= 180;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.longitude');
    }
}
