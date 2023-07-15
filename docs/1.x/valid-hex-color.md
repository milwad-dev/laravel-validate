## ValidHexColor

If you may to validation hex color code, you can use `ValidHexColor` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHexColor;

return [
    'hex-color' => ['required', new ValidHexColor()], // hex-color => #fcba03
];
```
