## ValidNameDaysWeek

If you want to validate the name of week days, you can use the `ValidNameDaysWeek` rule:

```php
use Milwad\LaravelValidate\Rules\ValidNameDaysWeek;

return [
    'day' => ['required', new ValidNameDaysWeek()], // day => monday
];
```
