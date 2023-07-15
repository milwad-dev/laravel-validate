## ValidBase64

If you may to validation base64, you can use `ValidBase64` rule:

```php
use Milwad\LaravelValidate\Rules\ValidBase64;

return [
    'base64' => ['required', new ValidBase64()], // base64 => bWlsd2Fk
];
```
