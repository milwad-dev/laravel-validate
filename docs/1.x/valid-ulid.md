## ValidUlid

If you want to validate ulid, you can use the `ValidUlid` rule:

```php
use Milwad\LaravelValidate\Rules\ValidUlid;

return [
    'ulid' => ['required', new ValidUlid()], // ulid => 01ARZ3NDEKTSV4RRFFQ69G5FAV
];
```
