## ValidIranPostalCode

If you want to validate iran postal code, you can use `ValidIranPostalCode` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIranPostalCode;

return [
    'postal' => ['required', new ValidIranPostalCode()], // postal => 3354355599
];
```
