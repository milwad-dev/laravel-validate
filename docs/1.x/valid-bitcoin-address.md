## ValidBitcoinAddress

If you may to validation bitcoin address you can use `ValidBitcoinAddress` rule: 

```php
use Milwad\LaravelValidate\Rules\ValidBitcoinAddress;

return [
    'bitcoin-address' => ['required', new ValidBitcoinAddress()], // bitcoin-address => 1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY
];
```
