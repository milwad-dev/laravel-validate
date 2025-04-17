<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Milwad\LaravelValidate\Utils\CountryLandlineCallback;

class ValidLandlineNumber implements Rule
{
    public function __construct(protected ?string $code = null) {}

    /**
     * Check phone number is valid.
     */
    public function passes($attribute, $value): bool
    {
        if (is_string($this->code)) {
            $passes = CountryLandlineCallback::callLandlineValidator($this->code, $value);

            return collect($passes)->some(fn ($passe) => $passe);
        }

        return preg_match('/^(?:\+|00)(?:[1-9]\d{0,2})(?:[ .\-]?\(?\d+\)?)+$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.landline-number');
    }
}
