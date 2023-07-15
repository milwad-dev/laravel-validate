## ValidBitcoinAddress

If you want to validate Bitcoin address you can use the `ValidBitcoinAddress` rule: 

```php
use Milwad\LaravelValidate\Rules\ValidBitcoinAddress;

return [
    'bitcoin-address' => ['required', new ValidBitcoinAddress()], // bitcoin-address => 1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY
];
```
