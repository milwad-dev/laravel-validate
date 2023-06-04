<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidKebabCase implements ValidationRule
{
    /**
     * Check value is kebab case.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^(?:\p{Ll}+\-)*\p{Ll}+$/u', $value)) {
            $fail('validate.kebab-case')->translate();
        }
    }
}
