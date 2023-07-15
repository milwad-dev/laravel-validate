## ValidHexColor

If you want to validate the hex color code, you can use the `ValidHexColor` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHexColor;

return [
    'hex-color' => ['required', new ValidHexColor()], // hex-color => #fcba03
];
```
