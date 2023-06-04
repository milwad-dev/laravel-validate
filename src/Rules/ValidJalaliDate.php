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

    /**
     * Check jalali date validity.
     *
     * @param $value
     * @return bool
     */
    private function isJalaliDateValid($value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $date = explode('/', $value);

        return CalendarUtils::checkDate(...$date);
    }
}
