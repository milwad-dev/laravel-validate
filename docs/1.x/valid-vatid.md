## ValidVatId

If you want to validate vatid, you can use `ValidVatId` rule:

```php
use Milwad\LaravelValidate\Rules\ValidVatId;

return [
    'vatid' => ['required', new ValidVatId()], // vatid => EL123456789123
];
```
