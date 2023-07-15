## ValidPort

If you want to validate the port, you can use the `ValidPort` rule:

```php
use Milwad\LaravelValidate\Rules\ValidPort;

return [
    'port' => ['required', new ValidPort()], // port => 8080
];
```
