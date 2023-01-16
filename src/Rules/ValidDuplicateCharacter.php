<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Morilog\Jalali\CalendarUtils;

class ValidDuplicateCharacter implements Rule
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

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.duplicate_character');
    }
}