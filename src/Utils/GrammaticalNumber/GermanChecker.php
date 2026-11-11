<?php

namespace Milwad\LaravelValidate\Utils\GrammaticalNumber;

use cijic\phpMorphy\Morphy;

class GermanChecker implements GrammaticalNumberChecker
{
    /**
     * The phpMorphy instance, created on first use.
     */
    protected ?Morphy $morphy = null;

    /**
     * Determine if the German dictionary (cijic/phpmorphy) is installed.
     */
    public static function isAvailable(): bool
    {
        return class_exists(Morphy::class);
    }

    /**
     * Determine if the word can be singular.
     */
    public function isSingular(string $word): bool
    {
        [$singular, $plural] = $this->numbers($word);

        return $singular || ! $plural;
    }

    /**
     * Determine if the word can be plural.
     */
    public function isPlural(string $word): bool
    {
        [$singular, $plural] = $this->numbers($word);

        return $plural || ! $singular;
    }

    /**
     * Get whether the word has a nominative singular and a nominative plural noun reading.
     *
     * @return array{0: bool, 1: bool}
     */
    protected function numbers(string $word): array
    {
        $singular = $plural = false;

        if (! static::isAvailable()) {
            return [$singular, $plural];
        }

        $this->morphy ??= new Morphy('de');

        $paradigms = $this->morphy->getGramInfo(mb_strtoupper($word, 'UTF-8')) ?: [];

        foreach ($paradigms as $forms) {
            foreach ($forms as $form) {
                if ($form['pos'] !== 'SUB' || ! in_array('NOM', $form['grammems'], true)) {
                    continue;
                }

                $singular = $singular || in_array('SIN', $form['grammems'], true);
                $plural = $plural || in_array('PLU', $form['grammems'], true);
            }
        }

        return [$singular, $plural];
    }
}
