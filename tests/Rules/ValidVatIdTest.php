<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidVatId;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidVatIdTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidVatId::class;

    private string $validData = 'EL123456789';

    private string $invalidData = 'EL123456789123678912';

    /**
     * Test vatid is not valid (too long).
     */
    public function test_vat_is_to_long_valid()
    {
        $this->assertValidationFails(
            ['vat_id' => 'EL1234567891236789123'],
            ['vat_id' => [new ValidVatId]]
        );
    }
}
