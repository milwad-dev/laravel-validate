## ValidPascalCase

If you want to validate the Pascal-case string, you can use the `ValidPascalCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidPascalCase;

return [
    'pascal-case' => ['required', new ValidPascalCase()], // pascal-case => MilwadDev
];
```
