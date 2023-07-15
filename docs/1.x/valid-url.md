## ValidUrl

If you may to validation url, you can use `ValidUrl` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUrl;

return [
    'port' => ['required', new ValidUrl()], // port => https://www.google.com
];
```
