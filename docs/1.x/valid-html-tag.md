## ValidHtmlTag

If you want to validate the HTML tag, you can use the `ValidHtmlTag` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHtmlTag;

return [
    'html-tag' => ['required', new ValidHtmlTag()], // html-tag => <h1></h1>
];
```
