<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidHashtag implements ValidationRule
{
    /**
     * Check value contains hashtag.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^#[^ !@#$%^&*(),.?":{}|<>]*$/', $value)) {
            $fail('validate.hashtag')->translate();
        }
    }
}
