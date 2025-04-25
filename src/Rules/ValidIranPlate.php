<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidIranPlate implements Rule
{
    /**
     * Check License Plate Validator.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match("/^\d{2}\s?[آ-ی]\s?\d{3}\s?ایران\s?\d{2}$/u", $value);
    }

    /**
     * Get the License Plate Validator error message.
     */
    public function message(): string
    {
        return __('validate.iran-plate');
    }
}
