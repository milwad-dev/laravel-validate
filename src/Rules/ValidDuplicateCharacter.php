<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDuplicateCharacter implements Rule
{
    /**
     * Check duplicate characters, splitted by comma.
     */
    public function passes($attribute, $value): bool
    {
        $value = explode(',', $value);

        return collect($value)->duplicates()->isEmpty();
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.duplicate_character');
    }
}
