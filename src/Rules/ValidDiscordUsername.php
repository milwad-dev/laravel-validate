<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDiscordUsername implements Rule
{
    /**
     * Check discord username is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^.{3,32}#[0-9]{4}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.discord-username');
    }
}
