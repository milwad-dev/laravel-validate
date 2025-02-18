<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCountry;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidCountryTest extends TestCase
{
    /**
     * Test country is valid by values.
     */
    public function test_country_is_valid_by_values()
    {
        $rules = ['country' => [new ValidCountry]];

        foreach (config('laravel-validate.countries', []) as $country) {
            $data = ['country' => $country];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertTrue($passes);
        }
    }

    /**
     * Test country is valid by keys.
     */
    public function test_country_is_valid_by_keys()
    {
        $rules = ['country' => [new ValidCountry(true)]];

        foreach (array_keys(config('laravel-validate.countries', [])) as $country) {
            $data = ['country' => $country];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertTrue($passes);
        }
    }

    /**
     * Test country is not valid.
     */
    public function test_country_is_not_valid()
    {
        $rules = ['country' => [new ValidCountry]];
        $data = ['country' => 'Unknown'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
