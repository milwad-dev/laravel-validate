## ValidNationalCard

If you want to validate national card, you can use `ValidNationalCard` rule:

```php
use Milwad\LaravelValidate\Rules\ValidNationalCard;

return [
    'national-card' => ['required', new ValidNationalCard()], // national-card => 015016437
];
```