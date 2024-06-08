<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidHashtag implements Rule
{
    /**
     * Check value contains hashtag.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^#[^ !@#$%^&*(),.?":{}|<>]*$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.hashtag');
    }
}
