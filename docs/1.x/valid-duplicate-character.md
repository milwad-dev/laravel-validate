## ValidDuplicateCharacter

If you want to validate a duplicate character, you can use the `ValidDuplicateCharacter` rule:

```php
use Milwad\LaravelValidate\Rules\ValidDuplicateCharacter;

return [
    'char' => ['required', new ValidDuplicateCharacter()], // char => 1,2,3,4,5,6,7,8,9
];
```
