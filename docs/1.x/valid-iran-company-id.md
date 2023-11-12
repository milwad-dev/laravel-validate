## ValidIranCompanyId

If you want to validate Iran company id (Iranian National Legal Entity Identifier - Shenase Melli Ashkhas Hoghoghi), you can use the `ValidIranCompanyId` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIranCompanyId;

return [
    'company-id' => ['required', new ValidIranCompanyId()], // company-id => 14007650912
];
```
