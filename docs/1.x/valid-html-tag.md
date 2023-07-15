## ValidHtmlTag

If you may to validation html tag, you can use `ValidHtmlTag` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHtmlTag;

return [
    'html-tag' => ['required', new ValidHtmlTag()], // html-tag => <h1></h1>
];
```
