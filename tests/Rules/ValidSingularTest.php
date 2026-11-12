<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Doctrine\Inflector\Rules\Italian\InflectorFactory as ItalianInflectorFactory;
use Milwad\LaravelValidate\Rules\ValidSingular;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Utils\GrammaticalNumber\GermanChecker;
use Milwad\LaravelValidate\Utils\GrammaticalNumber\GrammaticalNumberChecker;
use RuntimeException;

class ValidSingularTest extends TestCase
{
    /**
     * Test singular is valid.
     */
    public function test_singular_is_valid(): void
    {
        foreach (['camera', 'Camera', 'bus', 'lens', 'status', 'analysis', 'child', 'person', 'payment method'] as $word) {
            $this->assertTrue($this->passes($word), $word);
        }
    }

    /**
     * Test singular is not valid.
     */
    public function test_singular_is_not_valid(): void
    {
        foreach (['cameras', 'Cameras', 'buses', 'lenses', 'statuses', 'children', 'people', 'payment methods'] as $word) {
            $this->assertFalse($this->passes($word), $word);
        }
    }

    /**
     * Test singular is not valid when the value is not a string.
     */
    public function test_singular_is_not_valid_when_value_is_not_string(): void
    {
        $this->assertFalse($this->passes(123));
        $this->assertFalse($this->passes(['camera']));
    }

    /**
     * Test words with the same singular and plural form are valid.
     */
    public function test_singular_is_valid_when_word_has_same_plural_form(): void
    {
        foreach (['sheep', 'series', 'news', 'software'] as $word) {
            $this->assertTrue($this->passes($word), $word);
        }
    }

    /**
     * Test singular is valid by specific locale.
     */
    public function test_singular_is_valid_by_specific_locale(): void
    {
        $words = [
            'es' => ['ciudad', 'ciudades'],
            'fr' => ['cheval', 'chevaux'],
            'nb' => ['bil', 'biler'],
            'pt' => ['animal', 'animais'],
            'pt_BR' => ['animal', 'animais'],
            'pt-BR' => ['animal', 'animais'],
            'tr' => ['kitap', 'kitaplar'],
        ];

        if (class_exists(ItalianInflectorFactory::class)) {
            $words['it'] = ['libro', 'libri'];
        }

        foreach ($words as $locale => [$singular, $plural]) {
            $this->assertTrue($this->passes($singular, $locale), "$locale: $singular");
            $this->assertFalse($this->passes($plural, $locale), "$locale: $plural");
        }
    }

    /**
     * Test the default locale is used and not the locale of the request.
     */
    public function test_singular_uses_default_locale_instead_of_request_locale(): void
    {
        $this->app->setLocale('fr');

        $this->assertFalse($this->passes('cameras'));
        $this->assertTrue($this->passes('chevaux'));
    }

    /**
     * Test the default locale can be changed in config.
     */
    public function test_singular_uses_locale_from_config(): void
    {
        config(['laravel-validate.grammatical-number-locale' => 'fr']);

        $this->assertFalse($this->passes('chevaux'));
        $this->assertTrue($this->passes('cheval'));
    }

    /**
     * Test all words are valid when the locale is not supported.
     */
    public function test_singular_is_valid_when_locale_is_not_supported(): void
    {
        $this->assertTrue($this->passes('cameras', 'ja'));
        $this->assertTrue($this->passes('boeken', 'nl'));
    }

    /**
     * Test german singular is valid.
     */
    public function test_german_singular_is_valid(): void
    {
        $this->skipWithoutGermanDictionary();

        $words = [
            'Blitz', 'Kamera', 'Objektiv', 'Haus', 'Buch', 'Straße', 'Zubehör',
            // Same singular and plural form
            'Lehrer', 'Fenster', 'Kabel', 'Mädchen',
            // Compound words
            'Blitzcontroller', 'Hintergrundsystem', 'Speicherkarte', 'LED-Panel',
            // Unknown words
            'Xyzzyq',
        ];

        foreach ($words as $word) {
            $this->assertTrue($this->passes($word, 'de'), $word);
            $this->assertTrue($this->passes($word, 'de_CH'), $word);
        }
    }

    /**
     * Test german singular is not valid.
     */
    public function test_german_singular_is_not_valid(): void
    {
        $this->skipWithoutGermanDictionary();

        $words = [
            'Blitze', 'Kameras', 'Objektive', 'Häuser', 'Bücher', 'Straßen', 'Eltern',
            // Compound words
            'Hintergrundsysteme', 'Dauerlichter',
        ];

        foreach ($words as $word) {
            $this->assertFalse($this->passes($word, 'de'), $word);
        }
    }

    /**
     * Test german words are valid when the dictionary is not installed.
     */
    public function test_german_singular_is_valid_when_dictionary_is_not_installed(): void
    {
        config(['laravel-validate.grammatical-number.de' => GermanCheckerWithoutDictionary::class]);

        $this->assertTrue($this->passes('Blitze', 'de'));
    }

    /**
     * Test singular can be checked by custom checker.
     */
    public function test_singular_is_checked_by_custom_checker(): void
    {
        config(['laravel-validate.grammatical-number.nl' => DutchChecker::class]);

        $this->assertTrue($this->passes('boek', 'nl'));
        $this->assertFalse($this->passes('Boeken', 'nl'));
    }

    /**
     * Test if checker is not instance of GrammaticalNumberChecker, will be thrown an exception.
     */
    public function test_if_checker_is_not_instance_of_grammatical_number_checker(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The checker is not instance of GrammaticalNumberChecker');

        config(['laravel-validate.grammatical-number.nl' => self::class]);

        $this->passes('boek', 'nl');
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
     * Validate the value with the singular rule.
     */
    protected function passes(mixed $value, ?string $locale = null): bool
    {
        $rules = ['singular' => [new ValidSingular($locale)]];
        $data = ['singular' => $value];

        return $this->app['validator']->make($data, $rules)->passes();
    }
}

class GermanCheckerWithoutDictionary extends GermanChecker
{
    public static function isAvailable(): bool
    {
        return false;
    }
}

class DutchChecker implements GrammaticalNumberChecker
{
    public function isSingular(string $word): bool
    {
        return $word !== 'boeken';
    }

    public function isPlural(string $word): bool
    {
        return $word !== 'boek';
    }
}
