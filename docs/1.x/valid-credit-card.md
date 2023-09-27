## ValidCreditCard

If you want to validate credit card numbers, you can use the `ValidCreditCard` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCreditCard;

return [
    'credit_card' => ['required', new ValidCreditCard()], // credit_card => 4111111111111111
];
```
