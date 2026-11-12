<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;
use InvalidArgumentException;
use Milwad\LaravelValidate\Utils\CountryCodes;

class ValidCountryCode implements Rule
{
    public const ALPHA2 = 'alpha2';

    public const ALPHA3 = 'alpha3';

    /**
     * The accepted code format.
     */
    protected string $format;

    /**
     * @param  string|array  $format  'alpha2' (e.g. US) or 'alpha3' (e.g. USA).
     *                                An array is accepted for string rules, e.g. 'ValidCountryCode:alpha3'.
     */
    public function __construct(string|array $format = self::ALPHA2)
    {
        $format = is_array($format) ? ($format[0] ?? self::ALPHA2) : $format;

        if (! in_array($format, [self::ALPHA2, self::ALPHA3], true)) {
            throw new InvalidArgumentException("Invalid country code format '$format'. Use 'alpha2' or 'alpha3'.");
        }

        $this->format = $format;
    }

    /**
     * Check the value is an ISO 3166-1 country code (case-insensitive).
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $value = strtoupper($value);

        return $this->format === self::ALPHA2
            ? isset(CountryCodes::ALPHA2_TO_ALPHA3[$value])
            : in_array($value, CountryCodes::ALPHA2_TO_ALPHA3, true);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.country-code');
    }
}
