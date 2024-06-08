<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidNameDaysWeek implements Rule
{
    /**
     * Check day is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?:sun(?:day)?|mon(?:day)?|tue(?:sday)?|wed(?:nesday)?|thu(?:rsday)?|fri(?:day)?|sat(?:urday)?)$/i', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.name-days-week');
    }
}
