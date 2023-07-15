## ValidSnakeCase

If you want to validate the snake-case string, you can use the `ValidSnakeCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidSnakeCase;

return [
    'snake-case' => ['required', new ValidSnakeCase()], // snake-case => milwad_dev
];
```
