## ValidCapitalCharWithNumber

If you want to validate a capital character with the number you can use the `ValidCapitalCharWithNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCapitalCharWithNumber;

return [
    'capital-char-number' => ['required', new ValidCapitalCharWithNumber()], // capital-char-with-number => MILWAD-84
];
```
