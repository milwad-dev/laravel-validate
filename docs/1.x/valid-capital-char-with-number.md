## ValidCapitalCharWithNumber

If you may to validation a capital character with number you can use `ValidCapitalCharWithNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCapitalCharWithNumber;

return [
    'bitcoin-address' => ['required', new ValidCapitalCharWithNumber()], // capital-char-with-number => MILWAD-84
];
```
