<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Morilog\Jalali\CalendarUtils;

class ValidJalaliDate implements Rule
{
    /**
     * Check jalali date is valid.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (! is_string($value)) {
            return false;
        }

        $date = explode('/', $value);

        return CalendarUtils::checkDate(...$date);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.jalali_date');
    }
}
