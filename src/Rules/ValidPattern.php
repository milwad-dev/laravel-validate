<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPattern implements ValidationRule
{
    public function __construct(
        private int $length,
        private string $seperator = '-'
    ) {
    }

    /**
     * Check texts with specific pattern.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isPatternValid($value)) {
            $fail('validate.pattern')->translate();
        }
    }

    private function isPatternValid($value)
    {
        $texts = explode($this->seperator, $value);

        foreach ($texts as $text) {
            if (strlen($text) !== $this->length) {
                return false;
            }
        }

        return true;
    }
}
