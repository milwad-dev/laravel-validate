## ValidSlashEndOfString

If you want to validate a slash at the end of the string, you can use the `ValidSlashEndOfString` rule:

```php
use Milwad\LaravelValidate\Rules\ValidSlashEndOfString;

return [
    'string' => ['required', new ValidSlashEndOfString()], // string => milwad/
];
```
