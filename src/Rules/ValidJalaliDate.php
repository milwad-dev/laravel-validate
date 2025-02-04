<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class ValidJalaliDate implements Rule
{
    public function __construct(
        public string $character = '/',
    ) {}

    /**
     * Check jalali date is valid.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $date = explode($this->character, $value);

        if (count($date) <= 1) {
            return false;
        }

        return $this->checkValidDate(...$date);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.jalali_date');
    }

    /**
     * Checking whether the date is a Jalali date or not.
     */
    protected function checkValidDate(int $year, int $month, int $day): bool
    {
        return ($year >= -61 && $year <= 3177)
            && ($month >= 1 && $month <= 12)
            && $day >= 1 && $day <= $this->jalaliMonthLength($year, $month, $day);
    }

    /**
     * Getting the number of days through the length of the month.
     */
    protected function jalaliMonthLength(int $year, int $month, int $day): int
    {
        if (Carbon::createFromDate($year, $month, $day)->isLeapYear() && $month === 12) {
            return 29;
        }
        if ($month <= 6) {
            return 31;
        }

        return 30;
    }
}
