## ValidCamelCase

If you want to validate the camel-case string, you can use the `ValidCamelCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCamelCase;

return [
    'camel-case' => ['required', new ValidCamelCase()], // camel-case => milwadDev
];
```
