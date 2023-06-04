<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidNameDaysWeek implements ValidationRule
{
    /**
     * Check day is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^(?:sun(?:day)?|mon(?:day)?|tue(?:sday)?|wed(?:nesday)?|thu(?:rsday)?|fri(?:day)?|sat(?:urday)?)$/i', $value)) {
            $fail('validate.name-days-week')->translate();
        }
    }
}
