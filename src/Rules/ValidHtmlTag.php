<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidHtmlTag implements ValidationRule
{
    /**
     * Check html tag is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^<([a-z1-6]+)([^<]+)*(?:>(.*)<\/\1>| *\/>)$/', $value)) {

            $fail('validate.html-tag')->translate();
        }
    }
}
