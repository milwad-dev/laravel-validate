## ValidSlashEndOfString

If you may to validation a slash that end of the string, you can use `ValidSlashEndOfString` rule:

```php
use Milwad\LaravelValidate\Rules\ValidSlashEndOfString;

return [
    'string' => ['required', new ValidSlashEndOfString()], // string => milwad/
];
```
