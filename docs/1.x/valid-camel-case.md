## ValidCamelCase

If you want to validate camel-case string, you can use `ValidCamelCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCamelCase;

return [
    'camel-case' => ['required', new ValidCamelCase()], // camel-case => milwadDev
];
```
