## ValidCssColor

If you want to validate any CSS color value, you can use the `ValidCssColor` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCssColor;

return [
    'brand_color' => ['required', new ValidCssColor()], // brand_color => rgb(252 186 3 / 80%)
];
```

These formats are accepted:

| Format  | Examples                                                    |
|---------|-------------------------------------------------------------|
| `hex`   | `#fff`, `#ffff`, `#fcba03`, `#fcba0380`                     |
| `rgb`   | `rgb(255, 0, 0)`, `rgba(255,0,0,.5)`, `rgb(255 0 0 / 50%)`  |
| `hsl`   | `hsl(120, 100%, 50%)`, `hsl(120deg 100% 50% / 0.5)`         |
| `hwb`   | `hwb(120 10% 20%)`                                          |
| `lab`   | `lab(50% 40 59.5)`                                          |
| `lch`   | `lch(52.2% 72.2 50)`                                        |
| `oklab` | `oklab(0.6 0.1 -0.1)`                                       |
| `oklch` | `oklch(0.7 0.15 180)`                                       |
| `named` | `red`, `rebeccapurple`, `transparent`, `currentcolor`       |

The check is case-insensitive, like CSS. Both the legacy comma syntax (`rgb(255, 0, 0)`) and the modern space syntax (`rgb(255 0 0 / 50%)`) are supported.

Values are range-checked: `rgb()` channels must be 0-255 or 0%-100%, alpha must be 0-1 or 0%-100%, and so on. Browsers would clamp `rgb(300, 0, 0)` to `rgb(255, 0, 0)`, but this rule rejects it, because an out-of-range value is almost always a mistake.

### Limiting the formats

Pass the formats you want to accept:

```php
return [
    'brand_color' => ['required', new ValidCssColor([ValidCssColor::HEX, ValidCssColor::RGB])],
];
```

With `using_container` enabled, you can use the string form:

```php
return [
    'brand_color' => 'required|ValidCssColor',         // every format
    'theme_color' => 'required|ValidCssColor:hex,rgb', // hex and rgb only
];
```

> **Note**
> If you only need hex colors, you can also use [`ValidHexColor`](valid-hex-color.md). Note that `ValidHexColor` makes the `#` optional and doesn't accept alpha (`#rrggbbaa`).
