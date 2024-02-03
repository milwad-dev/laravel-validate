<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPattern implements ValidationRule
{
    public function __construct(
        private int $length,
        private string $separator = '-'
    ) {}

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

    /**
     * Check if texts with specific pattern is valid
     *
     * @param mixed $value
     * @return bool
     */
    private function isPatternValid(mixed $value): bool
    {
        $texts = explode($this->separator, $value);

        foreach ($texts as $text) {
            if (strlen($text) !== $this->length) {
                return false;
            }
        }

        return true;
    }
}
