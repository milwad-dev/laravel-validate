<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidVatId implements ValidationRule
{
    /**
     * Check VAT ID for validity.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Remove all characters except letters and numbers
        $value = preg_replace('/[^a-zA-Z0-9]]/', '', $value);

        if (! preg_match('/[a-zA-Z]{2}[0-9]{0,12}$/', $value)) {
            $fail('validate.vat-id')->translate();
        }
    }
}
