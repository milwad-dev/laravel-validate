## ValidKebabCase

If you want to validate the kebab-case string, you can use the `ValidKebabCase` rule:

```php
use Milwad\LaravelValidate\Rules\ValidKebabCase;

return [
    'kebab-case' => ['required', new ValidKebabCase()], // kebab-case => milwad-dev
];
```
