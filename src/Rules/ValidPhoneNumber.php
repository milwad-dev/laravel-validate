<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Milwad\LaravelValidate\Utils\CountryPhoneCallback;

class ValidPhoneNumber implements Rule
{
    public function __construct(protected ?string $code = null) {}

    /**
     * Check phone number is valid.
     */
    public function passes($attribute, $value): bool
    {
        if (is_string($this->code)) {
            $passes = CountryPhoneCallback::callPhoneValidator($this->code, $value);

            return collect($passes)->some(fn ($passe) => $passe);
        }

        return preg_match('/^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.phone-number');
    }
}
