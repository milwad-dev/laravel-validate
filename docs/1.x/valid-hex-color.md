## ValidHexColor

If you want to validate hex color code, you can use `ValidHexColor` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHexColor;

return [
    'hex-color' => ['required', new ValidHexColor()], // hex-color => #fcba03
];
```
