<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidMongoObjectId implements Rule
{
    /**
     * Check MongoDB ObjectId is valid (24 hexadecimal characters).
     */
    public function passes($attribute, $value): bool
    {
        if ($value instanceof \MongoDB\BSON\ObjectId) {
            return true;
        }

        return is_string($value) && preg_match('/^[0-9a-fA-F]{24}$/D', $value) === 1;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.mongo-object-id');
    }
}
