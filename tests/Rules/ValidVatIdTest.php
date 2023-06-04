<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidVatId;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidVatIdTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test vatid is valid.
     *
     * @test
     *
     * @return void
     */
    public function vatid_is_valid()
    {
        $rules = ['vat_id' => [new ValidVatId()]];
        $data = ['vat_id' => 'EL123456789'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test vatid is not valid.
     *
     * @test
     *
     * @return void
     */
    public function vatid_is_not_valid()
    {
        $rules = ['vat_id' => [new ValidVatId()]];
        $data = ['vat_id' => 'EL123456789123678912'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test vatid is not valid (too long).
     *
     * @test
     *
     * @return void
     */
    public function vat_is_to_long_valid()
    {
        $rules = ['vat_id' => [new ValidVatId()]];
        $data = ['vat_id' => 'EL1234567891236789123'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
