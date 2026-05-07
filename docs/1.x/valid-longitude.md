## ValidLongitude

If you want to validate the longitude, you can use the `ValidLongitude` rule:

```php
use Milwad\LaravelValidate\Rules\ValidLongitude;

return [
   'longitude' => ['required', new ValidLongitude], // longitude => 51.377225156511855
];
```
