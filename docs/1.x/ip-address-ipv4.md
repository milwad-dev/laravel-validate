## ValidIpAddressIPV4

If you want to validation ipv4 address, you can use `ValidIpAddressIPV4` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIpAddressIPV4;

return [
    'ipv4' => ['required', new ValidIpAddressIPV4()], // ipv4 => 129.144.50.56
];
```
