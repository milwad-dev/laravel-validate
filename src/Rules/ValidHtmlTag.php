<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidHtmlTag implements Rule
{
    /**
     * Check html tag is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^<([a-z1-6]+)([^<]+)*(?:>(.*)<\/\1>| *\/>)$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.html-tag');
    }
}
