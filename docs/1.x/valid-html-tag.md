## ValidHtmlTag

If you want to validate html tag, you can use `ValidHtmlTag` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHtmlTag;

return [
    'html-tag' => ['required', new ValidHtmlTag()], // html-tag => <h1></h1>
];
```
