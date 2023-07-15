## ValidUrl

If you want to validate url, you can use `ValidUrl` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUrl;

return [
    'url' => ['required', new ValidUrl()], // url => https://www.google.com
];
```