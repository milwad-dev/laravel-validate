<?php

namespace Milwad\LaravelValidate\Utils\GrammaticalNumber;

interface GrammaticalNumberChecker
{
    /**
     * Determine if the word can be singular.
     *
     * Return false only when the word is known to be plural. Words that are
     * unknown, or that have the same singular and plural form, should pass.
     */
    public function isSingular(string $word): bool;

    /**
     * Determine if the word can be plural.
     *
     * Return false only when the word is known to be singular. Words that are
     * unknown, or that have the same singular and plural form, should pass.
     */
    public function isPlural(string $word): bool;
}
