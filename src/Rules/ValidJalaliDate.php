<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

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

        $date = explode('/', $value); // TODO: Add contruct for jalali date

        return $this->checkValidDate(...$date);
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

    /**
     * Checking whether the date is a Jalali date or not.
     */
    protected function checkValidDate(string $year, string $month, string $day): bool
    {
        return ($year >= -61 && $year <= 3177)
            && ($month >= 1 && $month <= 12)
            && $day >= 1 && $day <= $this->jalaliMonthLength((int) $month);
    }

    /**
     * Getting the number of days through the length of the month.
     */
    protected function jalaliMonthLength(int $month): int
    {
        if ($month <= 6) {
            return 31;
        }

        return 30; // TODO: Add 29 or 30 for some years
    }
}
