<?php

namespace Milwad\LaravelValidate\Tests\Rules;

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
            'phone_number' => [new ValidPhoneNumber()],
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
            'phone_number' => [new ValidPhoneNumber()],
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
        ];
        $data = [
            'phone_ir' => '09125555555',
            'phone_en' => '+447975777666',
            'phone_ne' => '+22799123456',
            'phone_sa' => '+966541234567',
            'phone_de' => '+4915123456789',
            'phone_gr' => '+302101234567',
            'phone_es' => '+34678901234',
        ];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
