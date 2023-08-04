## ValidSlug

If you want to validate slug, you can use the `ValidSlug` rule:

```php
use Milwad\LaravelValidate\Rules\ValidSlug;

return [
    'slug' => ['required', new ValidSlug()], // slug => milwad-dev
];
```
