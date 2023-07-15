## ValidJalaliDate

If you want to validate the Jalali date, you can use the `ValidJalaliDate` rule:

```php
use Milwad\LaravelValidate\Rules\ValidJalaliDate;

return [
    'date' => ['required', new ValidJalaliDate()], // date => 1384/8/25
];
```
