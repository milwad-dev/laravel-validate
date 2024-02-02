<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDiscordUsername implements ValidationRule
{
    /**
     * Check discord username is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^.{3,32}#[0-9]{4}$/', $value)) {

            $fail('validate.discord-username')->translate();
        }
    }
}
