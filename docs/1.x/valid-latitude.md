## ValidLatitude

If you want to validate the latitude, you can use the `ValidLatitude` rule:

```php
use Milwad\LaravelValidate\Rules\ValidLatitude;

return [
   'latitude' => ['required', new ValidLatitude], // latitude => 50.1109
];
```
