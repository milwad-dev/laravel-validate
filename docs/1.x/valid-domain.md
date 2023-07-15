## ValidDomain

If you want to validate domain, you can use `ValidDomain` rule:

```php
use Milwad\LaravelValidate\Rules\ValidDomain;

return [
    'domain' => ['required', new ValidDomain()], // domain => github.com
];
```
