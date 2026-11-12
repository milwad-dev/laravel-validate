## ValidPlural

If you want to validate that a word is plural, you can use the `ValidPlural` rule:

```php
use Milwad\LaravelValidate\Rules\ValidPlural;

return [
    'name' => ['required', new ValidPlural()], // name => cameras
];
```

For a phrase or a hyphenated word, the last word is checked (`payment methods`, `LED-Panels`).

The rule only rejects a word when it is recognized as singular. Words that have the same singular and plural form (`sheep`) and values in a language that is not supported will pass. Languages that are checked by spelling rules (for ex English) treat every word that does not look plural as singular, so a made-up word like `xyzzy` will fail. For German, words that are not in the dictionary will pass.

Also `ValidPlural` have the ability to validate a word with a specific locale:

```php
use Milwad\LaravelValidate\Rules\ValidPlural;

return [
    'name' => ['required', new ValidPlural('fr')], // name => chevaux
];
```

> **Note**  
> `ValidPlural` uses the same locale, languages and config as the `ValidSingular` rule. If you want to know which languages are supported, how the default locale is chosen, how to validate German words or how to add a custom language, you can read the [ValidSingular](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-singular.md) docs.

## ValidPlural Parameters

| Parameter | Type      | Default | Description                                                                         |
|-----------|-----------|---------|-------------------------------------------------------------------------------------|
| `locale`  | `?string` | `null`  | The locale of the value for ex (`en`, `pt_BR`). Uses the default locale when null. |

## Examples

### Valid Values

```text
cameras
payment methods
sheep
children
```

### Invalid Values

```text
camera
payment method
child
```
