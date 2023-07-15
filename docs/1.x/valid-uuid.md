## ValidUuid

If you may to validation uuid, you can use `ValidUuid` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUuid;

return [
    'uuid' => ['required', new ValidUuid()], // uuid => 123e4567-e89b-12d3-a456-426655440000
];
```
