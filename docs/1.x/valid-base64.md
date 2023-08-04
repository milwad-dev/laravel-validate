## ValidBase64

If you want to validate base64, you can use `ValidBase64` rule:

```php
use Milwad\LaravelValidate\Rules\ValidBase64;

return [
    'base64' => ['required', new ValidBase64()], // base64 => bWlsd2Fk
];
```
