## ValidEvenNumber

If you may to validation even numbers, you can use `ValidEvenNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidEvenNumber;

return [
    'number' => ['required', new ValidEvenNumber()], // number => 1024
];
```
