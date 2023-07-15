## ValidSnakeCase

If you want to validate snake-case string, you can use `ValidSnakeCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidSnakeCase;

return [
    'snake-case' => ['required', new ValidSnakeCase()], // snake-case => milwad_dev
];
```
