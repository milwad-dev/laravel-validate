<?php

namespace Milwad\LaravelValidate\Utils;

use Milwad\LaravelValidate\Utils\GrammaticalNumber\GrammaticalNumberChecker;
use Milwad\LaravelValidate\Utils\GrammaticalNumber\InflectorChecker;
use RuntimeException;

class GrammaticalNumber
{
    /**
     * Resolved checkers.
     */
    protected static array $checkers = [];

    /**
     * Determine if the value is singular in the given locale.
     */
    public static function isSingular(mixed $value, ?string $locale = null): bool
    {
        return self::check($value, $locale, fn (GrammaticalNumberChecker $checker, string $word) => $checker->isSingular($word));
    }

    /**
     * Determine if the value is plural in the given locale.
     */
    public static function isPlural(mixed $value, ?string $locale = null): bool
    {
        return self::check($value, $locale, fn (GrammaticalNumberChecker $checker, string $word) => $checker->isPlural($word));
    }

    /**
     * Get the checker of the locale, or null when the locale is not supported.
     */
    public static function checker(?string $locale = null): ?GrammaticalNumberChecker
    {
        $locale = str_replace('-', '_', $locale ?? self::defaultLocale());
        $language = strtolower(explode('_', $locale)[0]);

        $checkers = config('laravel-validate.grammatical-number', []);
        $checker = $checkers[$locale] ?? $checkers[$language] ?? null;

        if ($checker === null) {
            return self::$checkers[$language] ??= InflectorChecker::forLanguage($language);
        }

        if (! is_a($checker, GrammaticalNumberChecker::class, true)) {
            throw new RuntimeException('The checker is not instance of GrammaticalNumberChecker');
        }

        return self::$checkers[$checker] ??= new $checker;
    }

    /**
     * Get the locale that is used when a rule does not specify one.
     */
    public static function defaultLocale(): string
    {
        return config('laravel-validate.grammatical-number-locale') ?? app()->getLocale();
    }

    /**
     * Check the last word of the value, which carries the number of a phrase or compound.
     */
    protected static function check(mixed $value, ?string $locale, callable $callback): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $words = preg_split('/[\s\-]+/u', trim($value), -1, PREG_SPLIT_NO_EMPTY) ?: [];
        $word = preg_replace('/^[^\pL]+|[^\pL]+$/u', '', (string) end($words));
        $checker = self::checker($locale);

        // Without a word to check or rules for the locale there is nothing to object to.
        if ($word === '' || $word === null || $checker === null) {
            return true;
        }

        return $callback($checker, mb_strtolower($word, 'UTF-8'));
    }
}
