## ValidCartNumberIran

If you want to validate the cart Iran number, you can use the `ValidCartNumberIran` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCartNumberIran;

return [
    'number' => ['required', new ValidCartNumberIran()], // number => 1234123412341234
];
```
