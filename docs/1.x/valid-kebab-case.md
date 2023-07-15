## ValidKebabCase

If you want to validate kebab-case string, you can use `ValidKebabCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidKebabCase;

return [
    'kebab-case' => ['required', new ValidKebabCase()], // kebab-case => milwad-dev
];
```
