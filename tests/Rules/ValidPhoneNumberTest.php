<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use BadMethodCallException;
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;
use Milwad\LaravelValidate\Tests\BaseTest;
use Milwad\LaravelValidate\Utils\Country;

class ValidPhoneNumberTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test phone number is valid.
     *
     * @test
     *
     * @return void
     */
    public function phone_number_is_valid()
    {
        $rules = [
            'phone_number' => [new ValidPhoneNumber],
            'phone_ne' => [new ValidPhoneNumber(Country::NIGER)],
        ];
        $data = ['phone_number' => '09366000000', 'phone_ne' => '+22799123456'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test phone number is not valid.
     *
     * @test
     *
     * @return void
     */
    public function phone_number_is_not_valid()
    {
        $rules = [
            'phone_number' => [new ValidPhoneNumber],
            'phone_bj' => [new ValidPhoneNumber(Country::IRAN)],
        ];
        $data = [
            'phone_number' => '123456789',
            'phone_bj' => '09120000000',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test all phone number is valid by specific code.
     *
     * @test
     *
     * @return void
     */
    public function all_phone_number_is_valid_by_specific_code()
    {
        $rules = [
            'phone_ir' => [new ValidPhoneNumber(Country::IRAN)],
            'phone_en' => [new ValidPhoneNumber(Country::ENGLAND)],
            'phone_ne' => [new ValidPhoneNumber(Country::NIGER)],
            'phone_sa' => [new ValidPhoneNumber(Country::SAUDI_ARABIA)],
            'phone_de' => [new ValidPhoneNumber(Country::GERMANY)],
            'phone_gr' => [new ValidPhoneNumber(Country::GREECE)],
            'phone_es' => [new ValidPhoneNumber(Country::SPAIN)],
            'phone_fr' => [new ValidPhoneNumber(Country::FRANCE)],
            'phone_in' => [new ValidPhoneNumber(Country::INDIA)],
            'phone_id' => [new ValidPhoneNumber(Country::INDONESIA)],
            'phone_it' => [new ValidPhoneNumber(Country::ITALY)],
            'phone_ja' => [new ValidPhoneNumber(Country::JAPAN)],
            'phone_ko' => [new ValidPhoneNumber(Country::KOREAN)],
            'phone_ru' => [new ValidPhoneNumber(Country::RUSSIA)],
            'phone_se' => [new ValidPhoneNumber(Country::SWEDEN)],
            'phone_tr' => [new ValidPhoneNumber(Country::TURKEY)],
            'phone_ch' => [new ValidPhoneNumber(Country::CHINA)],
        ];
        $data = [
            'phone_ir' => '09125555555',
            'phone_en' => '+447975777666',
            'phone_ne' => '+22799123456',
            'phone_sa' => '+966541234567',
            'phone_de' => '+4915123456789',
            'phone_gr' => '+302101234567',
            'phone_es' => '+34678901234',
            'phone_fr' => '+33612345678',
            'phone_in' => '+919876543210',
            'phone_id' => '+62812345678',
            'phone_it' => '+39123456789',
            'phone_ja' => '+819012345678',
            'phone_ko' => '+821012345678',
            'phone_ru' => '+79101234567',
            'phone_se' => '+46701234567',
            'phone_tr' => '+905551234567',
            'phone_ch' => '+8613812345678',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test if phone number validate method is not exists, will be thrown an exception.
     *
     * @test
     *
     * @return void
     */
    public function if_phone_number_validate_method_is_not_exists()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage("Validator method for 'AZ' does not exist.");

        $rules = ['phone' => [new ValidPhoneNumber(Country::AZERBAIJAN)]];
        $data = ['phone' => '+62812345678'];

        $this->app['validator']->make($data, $rules)->passes();
    }
}
