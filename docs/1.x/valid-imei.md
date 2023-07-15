## ValidImei

If you want to validate imei, you can use `ValidImei` rule:

```php
use Milwad\LaravelValidate\Rules\ValidImei;

return [
    'imei' => ['required', new ValidImei()], // imei => 354809104295874
];
```
