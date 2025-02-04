<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPattern implements Rule
{
    public function __construct(
        private int $length,
        private string $separator = '-'
    ) {}

    /**
     * Check text with specific pattern.
     */
    public function passes($attribute, $value): bool
    {
        $texts = explode($this->separator, $value);

        foreach ($texts as $text) {
            if (strlen($text) !== $this->length) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.pattern');
    }
}
