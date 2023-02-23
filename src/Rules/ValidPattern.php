<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPattern implements Rule
{
    private $length;
    private $seperator;

    public function __construct(int $length, string $seperator = '-')
    {
        $this->length = $length;
        $this->seperator = $seperator;
    }

    /**
     * Check number is odd.
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