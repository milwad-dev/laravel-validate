## ValidSingular

If you want to validate that a word is singular, you can use the `ValidSingular` rule:

```php
use Milwad\LaravelValidate\Rules\ValidSingular;

return [
    'name' => ['required', new ValidSingular()], // name => camera
];
```

For a phrase or a hyphenated word, the last word is checked (`payment method`, `LED-Panel`).

The rule only rejects a word when it is recognized as plural. Words that have the same singular and plural form (`sheep`) and values in a language that is not supported will pass. For German, words that are not in the dictionary will also pass.

## Locale

By default, the rule uses the default locale of your application (`app.locale`), even if the locale of the current request has been changed with `App::setLocale()`. The validated value is usually stored data, and its language does not change with the language of the interface.

You can pass the locale of the value to the rule:

```php
use Milwad\LaravelValidate\Rules\ValidSingular;

return [
    'name' => ['required', new ValidSingular('fr')], // name => cheval
];
```

Or you can change the default for all rules in the config file:

```php
'grammatical-number-locale' => 'fr',
```

<a name="support-languages-singular-plural"></a>
## Support Languages

These languages are checked with the rules of [doctrine/inflector](https://github.com/doctrine/inflector), which is already installed with Laravel:

- ✅ English (en)
- ✅ Esperanto (eo) *
- ✅ French (fr)
- ✅ Italian (it) *
- ✅ Norwegian Bokmål (nb, no)
- ✅ Portuguese (pt)
- ✅ Spanish (es)
- ✅ Turkish (tr)

\* Requires `doctrine/inflector` 2.1 or higher.

> **Note**  
> These languages are checked by spelling rules and not by a dictionary, so a few singular words that look like a plural can be rejected (for ex `bias` or `chaos` in English).

## German

German plurals can not be detected by spelling rules, so German needs a dictionary. To keep the package small, the dictionary is not installed by default. If you want to validate German words, install [cijic/phpmorphy](https://github.com/cijic/phpmorphy):

```shell
composer require cijic/phpmorphy
```

```php
use Milwad\LaravelValidate\Rules\ValidSingular;

return [
    'name' => ['required', new ValidSingular('de')], // name => Blitz
];
```

Compound words that are not in the dictionary are recognized by their ending (`Blitzcontroller`, `Hintergrundsysteme`).

> **Note**  
> If `cijic/phpmorphy` is not installed, German values will pass like the values of any other language that is not supported.

## Custom Language

If you want to support another language, or replace the checker of a language, you can create a class that implements `GrammaticalNumberChecker`:

```php
use Milwad\LaravelValidate\Utils\GrammaticalNumber\GrammaticalNumberChecker;

class DutchChecker implements GrammaticalNumberChecker
{
    public function isSingular(string $word): bool
    {
        // Return false only if the word is known to be plural.
    }

    public function isPlural(string $word): bool
    {
        // Return false only if the word is known to be singular.
    }
}
```

And add it to the config file:

```php
'grammatical-number' => [
    'de' => GermanChecker::class,
    'nl' => DutchChecker::class,
],
```

The word is passed to the checker in lowercase.

## ValidSingular Parameters

| Parameter | Type      | Default | Description                                                                         |
|-----------|-----------|---------|-------------------------------------------------------------------------------------|
| `locale`  | `?string` | `null`  | The locale of the value for ex (`en`, `pt_BR`). Uses the default locale when null. |

## Examples

### Valid Values

```text
camera
payment method
sheep
bus
```

### Invalid Values

```text
cameras
payment methods
children
```
