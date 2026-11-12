<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidInstagramHandle implements Rule
{
    /**
     * Whether a leading "@" is accepted, e.g. "@milwad".
     */
    protected bool $allowAtSign;

    /**
     * @param  bool|array  $allowAtSign  Accept a leading "@".
     *                                  An array is accepted for string rules, e.g. 'ValidInstagramHandle:at'.
     */
    public function __construct(bool|array $allowAtSign = false)
    {
        $this->allowAtSign = is_array($allowAtSign) ? in_array('at', $allowAtSign, true) : $allowAtSign;
    }

    /**
     * Check Instagram handle is valid: 1-30 letters, digits, underscores or periods,
     * not starting or ending with a period and without two periods in a row.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        if ($this->allowAtSign && str_starts_with($value, '@')) {
            $value = substr($value, 1);
        }

        return preg_match('/^(?!\.)(?!.*\.\.)(?!.*\.$)[a-z\d_.]{1,30}$/iD', $value) === 1;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.instagram-handle');
    }
}
