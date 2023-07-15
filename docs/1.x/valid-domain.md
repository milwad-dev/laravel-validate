## ValidDomain

If you want to validate the domain, you can use the `ValidDomain` rule:

```php
use Milwad\LaravelValidate\Rules\ValidDomain;

return [
    'domain' => ['required', new ValidDomain()], // domain => github.com
];
```
