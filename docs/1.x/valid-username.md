## ValidUsername

If you may to validation username, you can use `ValidUsername` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUsername;

return [
    'username' => ['required', new ValidUsername()], // username => milwad
];
```
