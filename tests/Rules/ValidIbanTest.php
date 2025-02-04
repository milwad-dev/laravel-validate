<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIban;
use Milwad\LaravelValidate\Tests\BaseTest;
use Milwad\LaravelValidate\Utils\Country;

class ValidIbanTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test IBAN is valid without passing country.
     *
     * @test
     *
     * @return void
     */
    public function iban_is_valid_without_country()
    {
        $rules = ['iban' => [new ValidIban]];

        // Valid IBANs from all countries
        $ibans = [
            'AD1400080001001234567890',
            'AE460090000000123456789',
            'AL35202111090000000001234567',
            'AO06004400006729503010102',
            'AT483200000012345864',
            'AZ77VTBA00000000001234567890',
            'BA393385804800211234',
            'BE71096123456769',
            'BF42BF0840101300463574000390',
            'BG18RZBB91550123456789',
            'BH02CITI00001077181611',
            'BI43220001131012345678912345',
            'BJ66BJ0610100100144390000769',
            'BR1500000000000010932840814P2',
            'BY86AKBB10100000002966000000',
            'CF4220001000010120069700160',
            'CG3930011000101013451300019',
            'CH5604835012345678009',
            'CI93CI0080111301134291200589',
            'CM2110002000300277976315008',
            'CR23015108410026012345',
            'CV64000500000020108215144',
            'CY21002001950000357001234567',
            'CZ5508000000001234567899',
            'DE75512108001245126199',
            'DJ2110002010010409943020008',
            'DK9520000123456789',
            'DO22ACAU00000000000123456789',
            'DZ580002100001113000000570',
            'EE471000001020145685',
            'EG800002000156789012345180002',
            'ES7921000813610123456789',
            'FI1410093000123458',
            'FO9264600123456789',
            'FR7630006000011234567890189',
            'GA2140021010032001890020126',
            'GB33BUKB20201555555555',
            'GE60NB0000000123456789',
            'GI56XAPO000001234567890',
            'GL8964710123456789',
            'GQ7050002001003715228190196',
            'GR9608100010000001234567890',
            'GT20AGRO00000000001234567890',
            'GW04GW1430010181800637601',
            'HN54PISA00000000000000123124',
            'HR1723600001101234565',
            'HU93116000060000000012345676',
            'IE64IRCE92050112345678',
            'IL170108000000012612345',
            'IQ20CBIQ861800101010500',
            'IR062960000000100324200001',
            'IR710570029971601460641001',
            'IS750001121234563108962099',
            'IT60X0542811101000000123456',
            'JO71CBJO0000000000001234567890',
            'KM4600005000010010904400137',
            'KW81CBKU0000000000001234560101',
            'KZ244350000012344567',
            'LB92000700000000123123456123',
            'LC14BOSL123456789012345678901234',
            'LI7408806123456789012',
            'LT601010012345678901',
            'LU120010001234567891',
            'LV97HABA0012345678910',
            'LY38021001000000123456789',
            'MA64011519000001205000534921',
            'MC5810096180790123456789085',
            'MD21EX000000000001234567',
            'ME25505000012345678951',
            'MG4600005030071289421016045',
            'MK07200002785123453',
            'ML13ML0160120102600100668497',
            'MN580050099123456789',
            'MR1300020001010000123456753',
            'MT31MALT01100000000000000000123',
            'MU43BOMM0101123456789101000MUR',
            'MZ59000301080016367102371',
            'NE58NE0380100100130305000268',
            'NI92BAMC000000000000000003123123',
            'NL02ABNA0123456789',
            'NO8330001234567',
            'PK36SCBL0000001123456702',
            'PL10105000997603123456789123',
            'PS92PALS000000000400123456702',
            'PT50002700000001234567833',
            'QA54QNBA000000000000693123456',
            'RO66BACX0000001234567890',
            'RS35105008123123123173',
            'RU0204452560040702810412345678901',
            'SA4420000001234567891234',
            'SC74MCBL01031234567890123456USD',
            'SD8811123456789012',
            'SE7280000810340009783242',
            'SI56192001234567892',
            'SK8975000000000012345671',
            'SM76P0854009812123456789123',
            'SN08SN0100152000048500003035',
            'SO061000001123123456789',
            'ST23000200000289355710148',
            'SV43ACAT00000000000000123123',
            'TD8960002000010271091600153',
            'TG53TG0090604310346500400070',
            'TL380010012345678910106',
            'TN5904018104004942712345',
            'TR320010009999901234567890',
            'UA903052992990004149123456789',
            'VA59001123000012345678',
            'VG07ABVI0000000123456789',
            'XK051212012345678906',
        ];

        foreach ($ibans as $iban) {

            $data = ['iban' => $iban];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertTrue($passes);
        }
    }

    /**
     * Test IBAN is valid with passing a single country.
     *
     * @test
     *
     * @return void
     */
    public function iban_is_valid_with_a_country()
    {
        $rules = ['iban' => [new ValidIban(Country::IRAN)]];

        // Valid IBANs from all countries
        $ibans = [
            'IR062960000000100324200001',
            'IR710570029971601460641001',
        ];

        foreach ($ibans as $iban) {

            $data = ['iban' => $iban];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertTrue($passes);
        }
    }

    /**
     * Test IBAN is valid with passing multiple countries.
     *
     * @test
     *
     * @return void
     */
    public function iban_is_valid_with_multiple_countries()
    {
        $rules = ['iban' => [new ValidIban(Country::IRAN, Country::ICELAND)]];

        // Valid IBANs from all countries
        $ibans = [
            'IR062960000000100324200001',
            'IR710570029971601460641001',
            'IS750001121234563108962099',
        ];

        foreach ($ibans as $iban) {

            $data = ['iban' => $iban];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertTrue($passes);
        }
    }

    /**
     * Test IBAN is not valid without passing any country.
     *
     * @test
     *
     * @return void
     */
    public function iban_is_not_valid_without_country()
    {
        $rules = ['iban' => [new ValidIban]];

        // Some invalid IBANs
        $ibans = [
            'GB94BARC20201530093459',
            'IR710570029971901460641011',
        ];

        foreach ($ibans as $iban) {

            $data = ['iban' => $iban];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertFalse($passes);
        }
    }

    /**
     * Test IBAN is not valid with passing a single country.
     *
     * @test
     *
     * @return void
     */
    public function iban_is_not_valid_with_a_country()
    {
        $rules = ['iban' => [new ValidIban(Country::ICELAND)]];

        // Valid IBANs from all countries
        $ibans = [
            'IR062960000000100324200001',
            'IR710570029971601460641001',
        ];

        foreach ($ibans as $iban) {

            $data = ['iban' => $iban];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertFalse($passes);
        }
    }

    /**
     * Test IBAN is not valid with passing multiple countries.
     *
     * @test
     *
     * @return void
     */
    public function iban_is_not_valid_with_multiple_countries()
    {
        $rules = ['iban' => [new ValidIban([Country::IRAQ, Country::UKRAINE])]];

        // Valid IBANs from all countries
        $ibans = [
            'IR062960000000100324200001',
            'IR710570029971601460641001',
            'IS750001121234563108962099',
        ];

        foreach ($ibans as $iban) {

            $data = ['iban' => $iban];
            $passes = $this->app['validator']->make($data, $rules)->passes();
            $this->assertFalse($passes);
        }
    }
}
