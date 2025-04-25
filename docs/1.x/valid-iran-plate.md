## ValidIranPlate

If you want to validate the Iran license plate number, you can use the `ValidIranPlate` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIranPlate;

return [
    'car-plate-number' => ['required', new ValidCarNumber()], 
    /*
     * Iran plate license number:
     * 32 ی 321 ایران 45
     */
];
```
