<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPattern implements Rule
{
    public function __construct(
        private int $length,
        private string $seperator = '-'
    ) {}

    /**
     * Check texts with specific pattern.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $texts = explode($this->seperator, $value);

        foreach ($texts as $text) {
            if (strlen($text) !== $this->length) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.pattern');
    }
}