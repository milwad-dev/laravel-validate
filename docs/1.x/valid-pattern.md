## ValidPattern

Sometimes you need to validate text with a pattern, For example, you want to validate a text like (4444-4444-4444). If you want to check the length of the text is separate after `-` is 4, You can use this Rule:

```php
use Milwad\LaravelValidate\Rules\ValidPattern;

return [
    'pattern' => ['required', new ValidPattern(4, '-')], // pattern => 4444-4444-4444
];
```

And also you can change pattern character:

```php
use Milwad\LaravelValidate\Rules\ValidPattern;

return [
    'pattern' => ['required', new ValidPattern(4, '/')], // pattern => 4444/4444/4444
];
```
