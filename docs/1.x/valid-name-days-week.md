## ValidNameDaysWeek

If you want to validate name of week days, you can use `ValidNameDaysWeek` rule:

```php
use Milwad\LaravelValidate\Rules\ValidNameDaysWeek;

return [
    'day' => ['required', new ValidNameDaysWeek()], // day => monday
];
```
