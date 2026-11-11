<?php

namespace Milwad\LaravelValidate\Utils\GrammaticalNumber;

use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;
use InvalidArgumentException;

class InflectorChecker implements GrammaticalNumberChecker
{
    /**
     * Mapping of language codes to the languages of doctrine/inflector.
     */
    public const LANGUAGES = [
        'en' => 'english',
        'eo' => 'esperanto',
        'es' => 'spanish',
        'fr' => 'french',
        'it' => 'italian',
        'nb' => 'norwegian-bokmal',
        'no' => 'norwegian-bokmal',
        'pt' => 'portuguese',
        'tr' => 'turkish',
    ];

    public function __construct(protected Inflector $inflector) {}

    /**
     * Create a checker for the language code, or null when doctrine/inflector has no rules for it.
     */
    public static function forLanguage(string $language): ?self
    {
        if (! isset(self::LANGUAGES[$language])) {
            return null;
        }

        try {
            return new self(InflectorFactory::createForLanguage(self::LANGUAGES[$language])->build());
        } catch (InvalidArgumentException) {
            // The installed doctrine/inflector version does not ship this language.
            return null;
        }
    }

    /**
     * Determine if the word can be singular.
     */
    public function isSingular(string $word): bool
    {
        return ! $this->isKnownPlural($word);
    }

    /**
     * Determine if the word can be plural.
     */
    public function isPlural(string $word): bool
    {
        $plural = $this->inflector->pluralize($word);

        if ($plural === $word || $this->isKnownPlural($word)) {
            return true;
        }

        // The word changes when pluralized. It is a known singular when it is
        // its own singular form, or when its plural leads back to it.
        return $this->inflector->singularize($word) !== $word
            && $this->inflector->singularize($plural) !== $word;
    }

    /**
     * Determine if the inflection rules recognize the word as a plural form.
     */
    protected function isKnownPlural(string $word): bool
    {
        $singular = $this->inflector->singularize($word);

        if ($singular === $word) {
            return false;
        }

        if ($this->inflector->pluralize($word) === $word) {
            return true;
        }

        // Irregular plurals (children, mice) are pluralized again by the rules,
        // so check that the singular leads back to the word. Singular words
        // ending in "s" (bus, lens) are cut by the rules and are left alone.
        return $word !== $singular.'s' && $this->inflector->pluralize($singular) === $word;
    }
}
