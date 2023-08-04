## ValidImei

If you want to validate IMEI, you can use the `ValidImei` rule:

```php
use Milwad\LaravelValidate\Rules\ValidImei;

return [
    'imei' => ['required', new ValidImei()], // imei => 354809104295874
];
```
