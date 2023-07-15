## ValidNameDaysWeek

If you may to validation name of week days, you can use `ValidNameDaysWeek` rule:

```php
use Milwad\LaravelValidate\Rules\ValidNameDaysWeek;

return [
    'day' => ['required', new ValidNameDaysWeek()], // day => monday
];
```
