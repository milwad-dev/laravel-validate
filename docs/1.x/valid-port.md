## ValidPort

If you may to validation port you can use `ValidPort` rule:

```php
use Milwad\LaravelValidate\Rules\ValidPort;

return [
    'port' => ['required', new ValidPort()], // port => 8080
];
```
