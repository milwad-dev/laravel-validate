## ValidPascalCase

If you want to validate pascal-case string, you can use `ValidPascalCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidPascalCase;

return [
    'pascal-case' => ['required', new ValidPascalCase()], // pascal-case => MilwadDev
];
```
