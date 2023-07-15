## ValidCartNumberIran

If you may to validation cart iran number, you can use `ValidCartNumberIran` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCartNumberIran;

return [
    'number' => ['required', new ValidCartNumberIran()], // number => 1234123412341234
];
```
