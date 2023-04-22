<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidVatId implements Rule
{
    /**
     * Check VAT ID for validity.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove all characters except letters and numbers
        $value = preg_replace('/[^a-zA-Z0-9]]/', '', $value);

        return preg_match('/[a-zA-Z]{2}[0-9]{0,12}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.vat-id');
    }
}
