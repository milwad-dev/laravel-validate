<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use Milwad\LaravelValidate\Utils\GrammaticalNumber;

class ValidPlural implements Rule
{
    public function __construct(
        protected ?string $locale = null,
    ) {}

    /**
     * Check the word is plural.
     */
    public function passes($attribute, $value): bool
    {
        return GrammaticalNumber::isPlural($value, $this->locale);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.plural');
    }
}
