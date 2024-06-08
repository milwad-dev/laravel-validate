<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidHexColor implements Rule
{
    /**
     * Check hex color is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^#?(?:[a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.hex-color');
    }
}
