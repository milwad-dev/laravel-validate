<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidHexColor implements Rule
{
    /**
     * Check hex color is valid.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.hex-color');
    }
}
