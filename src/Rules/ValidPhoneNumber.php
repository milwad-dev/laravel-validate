<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Milwad\LaravelValidate\Utils\CountryPhoneCallback;

class ValidPhoneNumber implements ValidationRule
{
    public function __construct(protected ?string $code = null)
    {
    }

    /**
     * Check phone number is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isPhoneNumberValid($value)) {
            $fail('validate.phone-number')->translate();
        }
    }

    /**
     * Check phone number validity.
     *
     * @param $value
     * @return bool|int
     */
    private function isPhoneNumberValid($value): bool|int
    {
        if (is_string($this->code)) {
            $passes = (new CountryPhoneCallback($value, $this->code))->callPhoneValidator();

            return collect($passes)->some(fn ($passe) => $passe);
        }

        return preg_match('/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/', $value);
    }
}
