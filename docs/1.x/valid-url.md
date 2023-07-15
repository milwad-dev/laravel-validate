## ValidUrl

If you want to validate URL, you can use the `ValidUrl` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUrl;

return [
    'url' => ['required', new ValidUrl()], // url => https://www.google.com
];
```
