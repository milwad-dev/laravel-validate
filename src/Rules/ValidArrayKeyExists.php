<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidArrayKeyExists implements Rule
{
    /**
     * Check base64.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        \Illuminate\Validation\Rule::forEach(function (string $value, string $attribute) {
dd($value, $attribute);
        });
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.array.key_exists');
    }
}
