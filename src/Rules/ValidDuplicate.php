<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDuplicate implements Rule
{
    /**
     * Check duplicate value.
     */
    public function passes($attribute, $value): bool
    {
        $value = str_split($value);

        return collect($value)->duplicates()->isEmpty();
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.duplicate');
    }
}
