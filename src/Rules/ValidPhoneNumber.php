<?php

namespace Milwad\LaravelValidate\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Milwad\LaravelValidate\Utils\CountryPhoneCallback;

class ValidPhoneNumber implements Rule
{
    public function __construct(protected ?string $code = null)
    {
    }
    /**
     * Check phone number is valid.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (is_string($this->code)) {
            $passes =  (new CountryPhoneCallback($value, $this->code))->callPhoneValidator();
            return collect($passes)->some(fn ($passe) => $passe);
        }
        return preg_match('/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.phone-number');
    }
}
