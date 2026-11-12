<?php

namespace Milwad\LaravelValidate\Tests;

use Illuminate\Contracts\Validation\Rule;
use Milwad\LaravelValidate\Rules;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * In PCRE, `$` also matches right before a final "\n". Every whole-string pattern
 * must use the `D` modifier, so a valid value followed by a newline is rejected.
 */
class TrailingNewlineTest extends TestCase
{
    public static function rules(): array
    {
        return [
            'BitcoinAddress' => [new Rules\ValidBitcoinAddress, '1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY'],
            'CamelCase' => [new Rules\ValidCamelCase, 'milwadDev'],
            'CarNumber' => [new Rules\ValidCarNumber, 'KA01AB1234'],
            'DiscordUsername' => [new Rules\ValidDiscordUsername, 'Milwad#2134'],
            'Domain' => [new Rules\ValidDomain, 'github.com'],
            'EthereumAddress' => [new Rules\ValidEthereumAddress, '0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAed'],
            'HexColor' => [new Rules\ValidHexColor, '#fcba03'],
            'HtmlTag' => [new Rules\ValidHtmlTag, '<h1></h1>'],
            'IranPostalCode' => [new Rules\ValidIranPostalCode, '3354355599'],
            'Jwt' => [new Rules\ValidJwt, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEyMzQ1Njc4OTAifQ.umEYVDP_kZJGCI3tkU9dmq7CIumEU8Zvftc-klp-334'],
            'KebabCase' => [new Rules\ValidKebabCase, 'milwad-dev'],
            'LandlineNumber' => [new Rules\ValidLandlineNumber, '+98212223343'],
            'MongoObjectId' => [new Rules\ValidMongoObjectId, '507f1f77bcf86cd799439011'],
            'NameDaysWeek' => [new Rules\ValidNameDaysWeek, 'monday'],
            'NationalCard' => [new Rules\ValidNationalCard, '0151016437'],
            'PascalCase' => [new Rules\ValidPascalCase, 'MilwadDev'],
            'PhoneNumber' => [new Rules\ValidPhoneNumber, '09366000000'],
            'Port' => [new Rules\ValidPort, '8080'],
            'SlashEndOfString' => [new Rules\ValidSlashEndOfString, 'milwad/'],
            'Slug' => [new Rules\ValidSlug, 'milwad-dev'],
            'SnakeCase' => [new Rules\ValidSnakeCase, 'milwad_dev'],
            'StrongPassword' => [new Rules\ValidStrongPassword, 'Milwad123!'],
            'Ulid' => [new Rules\ValidUlid, '01ARZ3NDEKTSV4RRFFQ69G5FAV'],
            'Username' => [new Rules\ValidUsername, 'milwad'],
            'Uuid' => [new Rules\ValidUuid, '123e4567-e89b-12d3-a456-426655440000'],
        ];
    }

    public static function phoneValidators(): array
    {
        return [
            'CM' => [new CountryPhoneValidator\CMPhoneValidator, '+237691234564'],
            'DE' => [new CountryPhoneValidator\DEPhoneValidator, '+4915123456789'],
            'EN' => [new CountryPhoneValidator\ENPhoneValidator, '+447975777666'],
            'ES' => [new CountryPhoneValidator\ESPhoneValidator, '+34678901234'],
            'FR' => [new CountryPhoneValidator\FRPhoneValidator, '+33612345678'],
            'GR' => [new CountryPhoneValidator\GRPhoneValidator, '+302101234567'],
            'ID' => [new CountryPhoneValidator\IDPhoneValidator, '+62812345678'],
            'IN' => [new CountryPhoneValidator\INPhoneValidator, '+919876543210'],
            'IR' => [new CountryPhoneValidator\IRPhoneValidator, '09125555555'],
            'IT' => [new CountryPhoneValidator\ITPhoneValidator, '+39123456789'],
            'KO' => [new CountryPhoneValidator\KOPhoneValidator, '+821012345678'],
            'NE' => [new CountryPhoneValidator\NEPhoneValidator, '+22799123456'],
            'NL' => [new CountryPhoneValidator\NLPhoneValidator, '+31612345678'],
            'RU' => [new CountryPhoneValidator\RUPhoneValidator, '+79101234567'],
            'SA' => [new CountryPhoneValidator\SAPhoneValidator, '+966541234567'],
            'SE' => [new CountryPhoneValidator\SEPhoneValidator, '+46701234567'],
            'TR' => [new CountryPhoneValidator\TRPhoneValidator, '+905551234567'],
            'ZH' => [new CountryPhoneValidator\ZHPhoneValidator, '+8613812345678'],
        ];
    }

    public static function landlineValidators(): array
    {
        return [
            'CM' => [new CountryLandlineValidator\CMLandlineValidator, '+237222123456'],
            'DE' => [new CountryLandlineValidator\DELandlineValidator, '+493012345678'],
            'EN' => [new CountryLandlineValidator\ENLandlineValidator, '+442071234567'],
            'ES' => [new CountryLandlineValidator\ESLandlineValidator, '+34912345678'],
            'FR' => [new CountryLandlineValidator\FRLandlineValidator, '+33123456789'],
            'GR' => [new CountryLandlineValidator\GRLandlineValidator, '+302112345678'],
            'ID' => [new CountryLandlineValidator\IDLandlineValidator, '+62211234567'],
            'IN' => [new CountryLandlineValidator\INLandlineValidator, '+911123456789'],
            'IR' => [new CountryLandlineValidator\IRLandlineValidator, '02155555555'],
            'IT' => [new CountryLandlineValidator\ITLandlineValidator, '+390612345678'],
            'JA' => [new CountryLandlineValidator\JALandlineValidator, '+81312345678'],
            'KO' => [new CountryLandlineValidator\KOLandlineValidator, '+82231234567'],
            'NE' => [new CountryLandlineValidator\NELandlineValidator, '+22720301234'],
            'NL' => [new CountryLandlineValidator\NLLandlineValidator, '+31201234567'],
            'RU' => [new CountryLandlineValidator\RULandlineValidator, '+74951234567'],
            'SA' => [new CountryLandlineValidator\SALandlineValidator, '+966512345678'],
            'SE' => [new CountryLandlineValidator\SELandlineValidator, '+46812345678'],
            'TR' => [new CountryLandlineValidator\TRLandlineValidator, '+902123456789'],
            'ZH' => [new CountryLandlineValidator\ZHLandlineValidator, '+861012345678'],
        ];
    }

    #[DataProvider('rules')]
    public function test_rule_rejects_trailing_newline(Rule $rule, string $valid)
    {
        $this->assertTrue((bool) $rule->passes('field', $valid), "Expected '$valid' to pass.");
        $this->assertFalse((bool) $rule->passes('field', $valid."\n"), 'Expected the value with a trailing newline to fail.');
    }

    #[DataProvider('phoneValidators')]
    public function test_phone_validator_rejects_trailing_newline(CountryPhoneValidator\CountryPhoneValidator $validator, string $valid)
    {
        $this->assertTrue((bool) $validator->validate($valid), "Expected '$valid' to pass.");
        $this->assertFalse((bool) $validator->validate($valid."\n"), 'Expected the value with a trailing newline to fail.');
    }

    #[DataProvider('landlineValidators')]
    public function test_landline_validator_rejects_trailing_newline(CountryLandlineValidator\CountryLandlineValidator $validator, string $valid)
    {
        $this->assertTrue((bool) $validator->validate($valid), "Expected '$valid' to pass.");
        $this->assertFalse((bool) $validator->validate($valid."\n"), 'Expected the value with a trailing newline to fail.');
    }

    /**
     * ULID used to match anywhere inside a longer string.
     */
    public function test_ulid_must_match_whole_string()
    {
        $this->assertFalse((new Rules\ValidUlid)->passes('ulid', 'prefix-01ARZ3NDEKTSV4RRFFQ69G5FAV-suffix'));
    }
}
