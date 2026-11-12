<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use InvalidArgumentException;
use Milwad\LaravelValidate\LaravelValidateServiceProvider;
use Milwad\LaravelValidate\Rules\ValidCountryCode;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Utils\CountryCodes;

class ValidCountryCodeTest extends TestCase
{
    /**
     * Test alpha-2 country code is valid.
     */
    public function test_alpha2_country_code_is_valid()
    {
        foreach (['US', 'NL', 'IR', 'DE', 'GB', 'AX', 'us', 'nl'] as $code) {
            $this->assertTrue($this->validate($code), "Expected '$code' to be a valid alpha-2 code.");
        }
    }

    /**
     * Test alpha-2 country code is not valid.
     */
    public function test_alpha2_country_code_is_not_valid()
    {
        foreach (['USA', 'U', 'ZZ', 'UK', 'XK', 'EU', '12', 'United States'] as $code) {
            $this->assertFalse($this->validate($code), "Expected '$code' to be an invalid alpha-2 code.");
        }
    }

    /**
     * Test alpha-3 country code is valid.
     */
    public function test_alpha3_country_code_is_valid()
    {
        foreach (['USA', 'NLD', 'IRN', 'DEU', 'GBR', 'usa'] as $code) {
            $this->assertTrue($this->validate($code, ValidCountryCode::ALPHA3), "Expected '$code' to be a valid alpha-3 code.");
        }
    }

    /**
     * Test alpha-3 country code is not valid.
     */
    public function test_alpha3_country_code_is_not_valid()
    {
        foreach (['US', 'ABC', 'UKR1', 'XKK', 'GER'] as $code) {
            $this->assertFalse($this->validate($code, ValidCountryCode::ALPHA3), "Expected '$code' to be an invalid alpha-3 code.");
        }
    }

    /**
     * Test non-string values are not valid.
     */
    public function test_non_string_country_code_is_not_valid()
    {
        foreach ([123, ['US'], null, ''] as $value) {
            $this->assertFalse((new ValidCountryCode)->passes('country', $value));
        }
    }

    /**
     * Test the list holds all 249 ISO 3166-1 codes.
     */
    public function test_country_code_list_is_complete()
    {
        $this->assertCount(249, CountryCodes::ALPHA2_TO_ALPHA3);
        $this->assertCount(249, array_unique(CountryCodes::ALPHA2_TO_ALPHA3));
    }

    /**
     * Test an unknown format throws an exception.
     */
    public function test_invalid_format_throws_exception()
    {
        $this->expectException(InvalidArgumentException::class);

        new ValidCountryCode('numeric');
    }

    /**
     * Test country code rule as a string rule when using container.
     */
    public function test_country_code_as_string_rule()
    {
        config(['laravel-validate.using_container' => true]);
        (new LaravelValidateServiceProvider($this->app))->boot();

        $validator = $this->app['validator'];

        $this->assertTrue($validator->make(['c' => 'US'], ['c' => 'ValidCountryCode'])->passes());
        $this->assertFalse($validator->make(['c' => 'USA'], ['c' => 'ValidCountryCode'])->passes());
        $this->assertTrue($validator->make(['c' => 'USA'], ['c' => 'ValidCountryCode:alpha3'])->passes());
    }

    private function validate(string $code, string $format = ValidCountryCode::ALPHA2): bool
    {
        return $this->app['validator']
            ->make(['country' => $code], ['country' => [new ValidCountryCode($format)]])
            ->passes();
    }
}
