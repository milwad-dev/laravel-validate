## ValidCarNumber

If you want to validate the car number, you can use the `ValidCarNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCarNumber;

return [
    'car-number' => ['required', new ValidCarNumber()], // car-number => KA01AB1234
];
```
