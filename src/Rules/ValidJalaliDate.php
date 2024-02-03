<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Morilog\Jalali\CalendarUtils;

class ValidJalaliDate implements ValidationRule
{
    /**
     * Check jalali date is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isJalaliDateValid($value)) {

            $fail('validate.jalali_date')->translate();
        }
    }

    private function isJalaliDateValid(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $date = explode('/', $value); // TODO: Add construct for jalali date

        return CalendarUtils::checkDate(...$date);
    }
}
