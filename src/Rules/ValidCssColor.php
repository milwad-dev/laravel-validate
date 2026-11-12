<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use InvalidArgumentException;

class ValidCssColor implements Rule
{
    public const HEX = 'hex';

    public const RGB = 'rgb';

    public const HSL = 'hsl';

    public const HWB = 'hwb';

    public const LAB = 'lab';

    public const LCH = 'lch';

    public const OKLAB = 'oklab';

    public const OKLCH = 'oklch';

    public const NAMED = 'named';

    public const FORMATS = [
        self::HEX, self::RGB, self::HSL, self::HWB, self::LAB,
        self::LCH, self::OKLAB, self::OKLCH, self::NAMED,
    ];

    /**
     * CSS named colors, plus `transparent` and `currentcolor`.
     */
    public const NAMED_COLORS = [
        'aliceblue', 'antiquewhite', 'aqua', 'aquamarine', 'azure', 'beige', 'bisque', 'black',
        'blanchedalmond', 'blue', 'blueviolet', 'brown', 'burlywood', 'cadetblue', 'chartreuse',
        'chocolate', 'coral', 'cornflowerblue', 'cornsilk', 'crimson', 'cyan', 'darkblue', 'darkcyan',
        'darkgoldenrod', 'darkgray', 'darkgreen', 'darkgrey', 'darkkhaki', 'darkmagenta',
        'darkolivegreen', 'darkorange', 'darkorchid', 'darkred', 'darksalmon', 'darkseagreen',
        'darkslateblue', 'darkslategray', 'darkslategrey', 'darkturquoise', 'darkviolet', 'deeppink',
        'deepskyblue', 'dimgray', 'dimgrey', 'dodgerblue', 'firebrick', 'floralwhite', 'forestgreen',
        'fuchsia', 'gainsboro', 'ghostwhite', 'gold', 'goldenrod', 'gray', 'green', 'greenyellow',
        'grey', 'honeydew', 'hotpink', 'indianred', 'indigo', 'ivory', 'khaki', 'lavender',
        'lavenderblush', 'lawngreen', 'lemonchiffon', 'lightblue', 'lightcoral', 'lightcyan',
        'lightgoldenrodyellow', 'lightgray', 'lightgreen', 'lightgrey', 'lightpink', 'lightsalmon',
        'lightseagreen', 'lightskyblue', 'lightslategray', 'lightslategrey', 'lightsteelblue',
        'lightyellow', 'lime', 'limegreen', 'linen', 'magenta', 'maroon', 'mediumaquamarine',
        'mediumblue', 'mediumorchid', 'mediumpurple', 'mediumseagreen', 'mediumslateblue',
        'mediumspringgreen', 'mediumturquoise', 'mediumvioletred', 'midnightblue', 'mintcream',
        'mistyrose', 'moccasin', 'navajowhite', 'navy', 'oldlace', 'olive', 'olivedrab', 'orange',
        'orangered', 'orchid', 'palegoldenrod', 'palegreen', 'paleturquoise', 'palevioletred',
        'papayawhip', 'peachpuff', 'peru', 'pink', 'plum', 'powderblue', 'purple', 'rebeccapurple',
        'red', 'rosybrown', 'royalblue', 'saddlebrown', 'salmon', 'sandybrown', 'seagreen', 'seashell',
        'sienna', 'silver', 'skyblue', 'slateblue', 'slategray', 'slategrey', 'snow', 'springgreen',
        'steelblue', 'tan', 'teal', 'thistle', 'tomato', 'turquoise', 'violet', 'wheat', 'white',
        'whitesmoke', 'yellow', 'yellowgreen',
        'transparent', 'currentcolor',
    ];

    private const NUMBER = '[+-]?(?:\d+\.?\d*|\.\d+)(?:e[+-]?\d+)?';

    /**
     * The accepted formats.
     */
    protected array $formats;

    /**
     * @param  array  $formats  The accepted formats (see FORMATS). Empty accepts every format.
     *                          For string rules: 'ValidCssColor:hex,rgb'.
     */
    public function __construct(array $formats = [])
    {
        $formats = array_map('strtolower', $formats);

        if ($unknown = array_diff($formats, self::FORMATS)) {
            throw new InvalidArgumentException(
                'Unknown CSS color format: '.implode(', ', $unknown).'. Use: '.implode(', ', self::FORMATS).'.'
            );
        }

        $this->formats = $formats ?: self::FORMATS;
    }

    /**
     * Check the value is a valid CSS color.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $value = strtolower($value);

        if ($value !== '' && $value[0] === '#') {
            return $this->allows(self::HEX) && preg_match('/^#(?:[0-9a-f]{3,4}|[0-9a-f]{6}|[0-9a-f]{8})$/D', $value) === 1;
        }

        if (preg_match('/^([a-z]+)\((.*)\)$/Ds', $value, $matches)) {
            return $this->passesFunction($matches[1], trim($matches[2]));
        }

        return $this->allows(self::NAMED) && in_array($value, self::NAMED_COLORS, true);
    }

    /**
     * Check a functional color, e.g. rgb(0 0 0 / 50%).
     */
    protected function passesFunction(string $name, string $arguments): bool
    {
        $format = match ($name) {
            'rgb', 'rgba' => self::RGB,
            'hsl', 'hsla' => self::HSL,
            'hwb', 'lab', 'lch', 'oklab', 'oklch' => $name,
            default => null,
        };

        if ($format === null || ! $this->allows($format)) {
            return false;
        }

        // Legacy comma syntax, only for rgb() and hsl(): rgb(255, 0, 0, 0.5)
        if (str_contains($arguments, ',')) {
            if (! in_array($format, [self::RGB, self::HSL], true)) {
                return false;
            }

            $parts = array_map('trim', explode(',', $arguments));

            if (count($parts) < 3 || count($parts) > 4) {
                return false;
            }

            $channels = array_slice($parts, 0, 3);
            $alpha = $parts[3] ?? null;

            if (in_array('none', $parts, true)) {
                return false;
            }

            if ($format === self::RGB) {
                // Legacy rgb() must use all numbers or all percentages.
                $percentages = array_filter($channels, fn ($c) => str_ends_with($c, '%'));
                if (count($percentages) !== 0 && count($percentages) !== 3) {
                    return false;
                }
            } elseif (! str_ends_with($channels[1], '%') || ! str_ends_with($channels[2], '%')) {
                // Legacy hsl() needs percentages for saturation and lightness.
                return false;
            }

            return $this->passesChannels($format, $channels) && ($alpha === null || $this->isAlpha($alpha));
        }

        // Modern space syntax: rgb(255 0 0 / 50%)
        $sections = explode('/', $arguments);

        if (count($sections) > 2) {
            return false;
        }

        $channels = preg_split('/\s+/', trim($sections[0]), -1, PREG_SPLIT_NO_EMPTY);
        $alpha = isset($sections[1]) ? trim($sections[1]) : null;

        if (count($channels) !== 3 || $alpha === '') {
            return false;
        }

        return $this->passesChannels($format, $channels) && ($alpha === null || $this->isAlpha($alpha));
    }

    /**
     * Check the three color channels for the given format.
     */
    protected function passesChannels(string $format, array $channels): bool
    {
        [$first, $second, $third] = $channels;

        return match ($format) {
            self::RGB => $this->isRgbChannel($first) && $this->isRgbChannel($second) && $this->isRgbChannel($third),
            self::HSL, self::HWB => $this->isHue($first) && $this->isPercentLike($second) && $this->isPercentLike($third),
            self::LAB => $this->inRange($first, 0, 100) && $this->isNumberOrPercent($second) && $this->isNumberOrPercent($third),
            self::LCH => $this->inRange($first, 0, 100) && $this->isNonNegative($second) && $this->isHue($third),
            self::OKLAB => $this->inRange($first, 0, 1) && $this->isNumberOrPercent($second) && $this->isNumberOrPercent($third),
            self::OKLCH => $this->inRange($first, 0, 1) && $this->isNonNegative($second) && $this->isHue($third),
        };
    }

    /**
     * 0-255 or 0%-100%.
     */
    protected function isRgbChannel(string $value): bool
    {
        return $this->inRange($value, 0, 255);
    }

    /**
     * 0-1 or 0%-100%.
     */
    protected function isAlpha(string $value): bool
    {
        return $this->inRange($value, 0, 1);
    }

    /**
     * Saturation, lightness, whiteness or blackness: 0-100 or 0%-100%.
     */
    protected function isPercentLike(string $value): bool
    {
        return $this->inRange($value, 0, 100);
    }

    /**
     * A hue: a number or an angle (deg, rad, grad, turn). Hues wrap, so any value is allowed.
     */
    protected function isHue(string $value): bool
    {
        return $value === 'none' || preg_match('/^'.self::NUMBER.'(?:deg|rad|grad|turn)?$/D', $value) === 1;
    }

    protected function isNumberOrPercent(string $value): bool
    {
        return $value === 'none' || preg_match('/^'.self::NUMBER.'%?$/D', $value) === 1;
    }

    protected function isNonNegative(string $value): bool
    {
        return $this->isNumberOrPercent($value) && ($value === 'none' || (float) $value >= 0);
    }

    /**
     * A number between $min and $max, or a percentage between 0% and 100%, or `none`.
     */
    protected function inRange(string $value, float $min, float $max): bool
    {
        if ($value === 'none') {
            return true;
        }

        if (preg_match('/^('.self::NUMBER.')(%?)$/D', $value, $matches) !== 1) {
            return false;
        }

        $number = (float) $matches[1];

        return $matches[2] === '%'
            ? $number >= 0 && $number <= 100
            : $number >= $min && $number <= $max;
    }

    protected function allows(string $format): bool
    {
        return in_array($format, $this->formats, true);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.css-color');
    }
}
