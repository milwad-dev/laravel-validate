## ValidSlug

If you may to validation slug, you can use `ValidSlug` rule:

```php
use Milwad\LaravelValidate\Rules\ValidSlug;

return [
    'slug' => ['required', new ValidSlug()], // slug => milwad-dev
];
```
