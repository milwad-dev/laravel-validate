## ValidIpAddressIPV6

If you want to validation ipv6 address, you can use `ValidIpAddressIPV6` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIpAddressIPV6;

return [
    'ipv6' => ['required', new ValidIpAddressIPV6()], // ipv6 => 2001:db8:3333:4444:5555:6666:7777:8888
];
```
