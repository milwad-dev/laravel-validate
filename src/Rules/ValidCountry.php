<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCountry implements Rule
{
    public function __construct(
        protected bool $validByKey = false,
    ) {}

    /**
     * Check country name is valid.
     */
    public function passes($attribute, $value): bool
    {
        $countries = config('laravel-validate.countries', []);

        // Check value exists in country keys
        if ($this->validByKey) {
            return array_key_exists($value, $countries);
        }

        return in_array($value, $countries);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.country');
    }
}
