## ValidUrl

If you may to validation url, you can use `ValidUrl` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUrl;

return [
    'url' => ['required', new ValidUrl()], // port => https://www.google.com
];
```
