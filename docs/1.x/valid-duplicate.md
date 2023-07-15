## ValidDuplicate

If you want to validate duplicate character, you can use the `ValidDuplicate` rule:

```php
use Milwad\LaravelValidate\Rules\ValidDuplicate;

return [
    'duplicate' => ['required', new ValidDuplicate()], // duplicate => 1123456
];
```
