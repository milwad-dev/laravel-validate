<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidNoHtml implements Rule
{
    public function __construct(
        public bool $strict = false,
    ) {}

    /**
     * Check no-html for string.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        if ($this->strict) {
            $value = html_entity_decode(
                $value,
                ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE,
                'UTF-8'
            );
        }

        return $value === strip_tags($value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.no-html');
    }
}
