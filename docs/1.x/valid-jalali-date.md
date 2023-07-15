## ValidJalaliDate

If you want to validate jalali date, you can use `ValidJalaliDate` rule:

```php
use Milwad\LaravelValidate\Rules\ValidJalaliDate;

return [
    'date' => ['required', new ValidJalaliDate()], // date => 1384/8/25
];
```
