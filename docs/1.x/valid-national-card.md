## ValidNationalCard

If you want to validate the national card, you can use the `ValidNationalCard` rule:

```php
use Milwad\LaravelValidate\Rules\ValidNationalCard;

return [
    'national-card' => ['required', new ValidNationalCard()], // national-card => 015016437
];
```
