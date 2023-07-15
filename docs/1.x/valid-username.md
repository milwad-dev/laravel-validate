## ValidUsername

If you want to validate the username, you can use the `ValidUsername` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUsername;

return [
    'username' => ['required', new ValidUsername()], // username => milwad
];
```
