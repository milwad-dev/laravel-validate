## ValidUsername

If you want to validate username, you can use `ValidUsername` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUsername;

return [
    'username' => ['required', new ValidUsername()], // username => milwad
];
```
