<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPlural;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Utils\GrammaticalNumber\GermanChecker;

class ValidPluralTest extends TestCase
{
    /**
     * Test plural is valid.
     */
    public function test_plural_is_valid(): void
    {
        foreach (['cameras', 'Cameras', 'buses', 'lenses', 'statuses', 'children', 'people', 'payment methods'] as $word) {
            $this->assertTrue($this->passes($word), $word);
        }
    }

    /**
     * Test plural is not valid.
     */
    public function test_plural_is_not_valid(): void
    {
        foreach (['camera', 'Camera', 'bus', 'lens', 'status', 'analysis', 'child', 'person', 'payment method'] as $word) {
            $this->assertFalse($this->passes($word), $word);
        }
    }

    /**
     * Test plural is not valid when the value is not a string.
     */
    public function test_plural_is_not_valid_when_value_is_not_string(): void
    {
        $this->assertFalse($this->passes(123));
        $this->assertFalse($this->passes(['cameras']));
    }

    /**
     * Test words with the same singular and plural form are valid.
     */
    public function test_plural_is_valid_when_word_has_same_singular_form(): void
    {
        foreach (['sheep', 'series', 'news', 'software'] as $word) {
            $this->assertTrue($this->passes($word), $word);
        }
    }

    /**
     * Test plural is valid by specific locale.
     */
    public function test_plural_is_valid_by_specific_locale(): void
    {
        $words = [
            'es' => ['ciudades', 'ciudad'],
            'fr' => ['chevaux', 'cheval'],
            'nb' => ['biler', 'bil'],
            'pt_BR' => ['animais', 'animal'],
            'tr' => ['kitaplar', 'kitap'],
        ];

        foreach ($words as $locale => [$plural, $singular]) {
            $this->assertTrue($this->passes($plural, $locale), "$locale: $plural");
            $this->assertFalse($this->passes($singular, $locale), "$locale: $singular");
        }
    }

    /**
     * Test the default locale is used and not the locale of the request.
     */
    public function test_plural_uses_default_locale_instead_of_request_locale(): void
    {
        $this->app->setLocale('fr');

        $this->assertTrue($this->passes('cameras'));
        $this->assertFalse($this->passes('chevaux'));
    }

    /**
     * Test all words are valid when the locale is not supported.
     */
    public function test_plural_is_valid_when_locale_is_not_supported(): void
    {
        $this->assertTrue($this->passes('camera', 'ja'));
    }

    /**
     * Test german plural is valid.
     */
    public function test_german_plural_is_valid(): void
    {
        $this->skipWithoutGermanDictionary();

        $words = [
            'Blitze', 'Kameras', 'Objektive', 'Häuser', 'Bücher', 'Straßen', 'Eltern',
            // Same singular and plural form
            'Lehrer', 'Fenster', 'Kabel', 'Mädchen',
            // Compound words
            'Blitzcontroller', 'Hintergrundsysteme', 'Speicherkarten', 'LED-Panels',
            // Unknown words
            'Xyzzyq',
        ];

        foreach ($words as $word) {
            $this->assertTrue($this->passes($word, 'de'), $word);
        }
    }

    /**
     * Test german plural is not valid.
     */
    public function test_german_plural_is_not_valid(): void
    {
        $this->skipWithoutGermanDictionary();

        $words = [
            'Blitz', 'Kamera', 'Objektiv', 'Haus', 'Buch', 'Straße', 'Zubehör',
            // Compound words
            'Hintergrundsystem', 'Speicherkarte', 'LED-Panel',
        ];

        foreach ($words as $word) {
            $this->assertFalse($this->passes($word, 'de'), $word);
        }
    }

    /**
     * Skip the test when the German dictionary (cijic/phpmorphy) is not installed.
     */
    protected function skipWithoutGermanDictionary(): void
    {
        if (! GermanChecker::isAvailable()) {
            $this->markTestSkipped('cijic/phpmorphy is not installed.');
        }
    }

    /**
     * Validate the value with the plural rule.
     */
    protected function passes(mixed $value, ?string $locale = null): bool
    {
        $rules = ['plural' => [new ValidPlural($locale)]];
        $data = ['plural' => $value];

        return $this->app['validator']->make($data, $rules)->passes();
    }
}
