<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCamelCase implements Rule
{
    /**
     * Check value is camel case.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(?:\p{Lu}?\p{Ll}+)(?:\p{Lu}\p{Ll}+)*$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.camel-case');
    }
}