## ValidIranPostalCode

If you want to validate Iran postal code, you can use the `ValidIranPostalCode` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIranPostalCode;

return [
    'postal' => ['required', new ValidIranPostalCode()], // postal => 3354355599
];
```
