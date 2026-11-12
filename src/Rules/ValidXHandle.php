<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidXHandle implements Rule
{
    /**
     * Whether a leading "@" is accepted, e.g. "@milwad".
     */
    protected bool $allowAtSign;

    /**
     * @param  bool|array  $allowAtSign  Accept a leading "@".
     *                                   An array is accepted for string rules, e.g. 'ValidXHandle:at'.
     */
    public function __construct(bool|array $allowAtSign = false)
    {
        $this->allowAtSign = is_array($allowAtSign) ? in_array('at', $allowAtSign, true) : $allowAtSign;
    }

    /**
     * Check X (Twitter) handle is valid: 1-15 letters, digits or underscores.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        if ($this->allowAtSign && str_starts_with($value, '@')) {
            $value = substr($value, 1);
        }

        return preg_match('/^[a-z\d_]{1,15}$/iD', $value) === 1;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.x-handle');
    }
}
