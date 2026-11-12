## ValidEthereumAddress

If you want to validate an Ethereum address, you can use the `ValidEthereumAddress` rule:

```php
use Milwad\LaravelValidate\Rules\ValidEthereumAddress;

return [
    'wallet' => ['required', new ValidEthereumAddress()], // wallet => 0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAed
];
```

The address must start with `0x` followed by 40 hexadecimal characters.

Mixed-case addresses are checked against their [EIP-55](https://eips.ethereum.org/EIPS/eip-55) checksum, so a typo in a checksummed address is caught. All-lowercase and all-uppercase addresses have no checksum and are accepted.

### Strict mode

To require a checksummed address, pass `true`:

```php
return [
    'wallet' => ['required', new ValidEthereumAddress(true)],
];
```

With `using_container` enabled, you can use the string form:

```php
return [
    'wallet' => 'required|ValidEthereumAddress',        // checksum checked when mixed-case
    'safe_wallet' => 'required|ValidEthereumAddress:strict', // checksum required
];
```
