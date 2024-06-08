<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidVatId implements Rule
{
    /**
     * Check VAT ID for validity.
     */
    public function passes($attribute, $value): bool
    {
        // Remove all characters except letters and numbers
        $value = preg_replace('/[^a-zA-Z0-9]/', '', $value);

        return preg_match('/[a-zA-Z]{2}[0-9]{0,12}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.vat-id');
    }
}
