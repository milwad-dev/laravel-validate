<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use BadMethodCallException;
use Milwad\LaravelValidate\Rules\ValidLandlineNumber;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Utils\Country;

class ValidLandlineNumberTest extends TestCase
{
    /**
     * Test landline number is valid.
     */
    public function test_landline_number_is_valid()
    {
        $rules = [
            'landline_number' => [new ValidLandlineNumber],
            'landline_de' => [new ValidLandlineNumber(Country::GERMANY)],
        ];
        $data = [
            'landline_number' => '+98212223343',
            'landline_de' => '+49301234567',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test landline number is not valid.
     */
    public function test_landline_number_is_not_valid()
    {
        $rules = [
            'landline_number' => [new ValidLandlineNumber],
            'landline_ir' => [new ValidLandlineNumber(Country::IRAN)],
        ];
        $data = [
            'landline_number' => '123456789',
            'landline_ir' => '09120000000',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test all landline number is valid by specific code.
     */
    public function test_all_landline_number_is_valid_by_specific_code()
    {
        $rules = [
            'landline_ir' => [new ValidLandlineNumber(Country::IRAN)],
            'landline_en' => [new ValidLandlineNumber(Country::ENGLAND)],
            'landline_ne' => [new ValidLandlineNumber(Country::NIGER)],
            'landline_sa' => [new ValidLandlineNumber(Country::SAUDI_ARABIA)],
            'landline_de' => [new ValidLandlineNumber(Country::GERMANY)],
            'landline_gr' => [new ValidLandlineNumber(Country::GREECE)],
            'landline_es' => [new ValidLandlineNumber(Country::SPAIN)],
            'landline_fr' => [new ValidLandlineNumber(Country::FRANCE)],
            'landline_in' => [new ValidLandlineNumber(Country::INDIA)],
            'landline_id' => [new ValidLandlineNumber(Country::INDONESIA)],
            'landline_it' => [new ValidLandlineNumber(Country::ITALY)],
            'landline_ja' => [new ValidLandlineNumber(Country::JAPAN)],
            'landline_ko' => [new ValidLandlineNumber(Country::KOREAN)],
            'landline_ru' => [new ValidLandlineNumber(Country::RUSSIA)],
            'landline_se' => [new ValidLandlineNumber(Country::SWEDEN)],
            'landline_tr' => [new ValidLandlineNumber(Country::TURKEY)],
            'landline_ch' => [new ValidLandlineNumber(Country::CHINA)],
            'landline_cm' => [new ValidLandlineNumber(Country::CAMEROON)],
        ];
        $data = [
            'landline_ir' => '02155555555',       // Iran - Tehran landline
            'landline_en' => '+442071234567',     // UK - London landline
            'landline_ne' => '+22720301234',      // Niger - Niamey landline
            'landline_sa' => '+966512345678',     // Saudi Arabia - Riyadh landline
            'landline_de' => '+493012345678',     // Germany - Berlin landline
            'landline_gr' => '+302112345678',     // Greece - Athens landline
            'landline_es' => '+34912345678',      // Spain - Madrid landline
            'landline_fr' => '+33123456789',      // France - Paris landline
            'landline_in' => '+911123456789',     // India - Delhi landline
            'landline_id' => '+62211234567',      // Indonesia - Jakarta landline
            'landline_it' => '+390612345678',     // Italy - Rome landline
            'landline_ja' => '+81312345678',      // Japan - Tokyo landline
            'landline_ko' => '+82231234567',      // South Korea - Seoul landline
            'landline_ru' => '+74951234567',      // Russia - Moscow landline
            'landline_se' => '+46812345678',      // Sweden - Stockholm landline
            'landline_tr' => '+902123456789',     // Turkey - Istanbul landline
            'landline_ch' => '+861012345678',     // China - Beijing landline
            'landline_cm' => '+237222123456',     // Cameroon - Douala landline
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test if landline number validate method is not exists, will be thrown an exception.
     */
    public function test_if_landline_number_validate_method_is_not_exists()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage("Validator method for 'AZ' does not exist.");

        $rules = ['landline' => [new ValidLandlineNumber(Country::AZERBAIJAN)]];
        $data = ['landline' => '+62812345678'];

        $this->app['validator']->make($data, $rules)->passes();
    }
}
