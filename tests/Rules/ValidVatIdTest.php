<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidVatId;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidVatIdTest extends TestCase
{
    /**
     * Test vatid is valid.
     */
    public function test_vatid_is_valid()
    {
        $rules = ['vat_id' => [new ValidVatId]];
        $data = ['vat_id' => 'EL123456789'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test vatid is not valid.
     */
    public function test_vatid_is_not_valid()
    {
        $rules = ['vat_id' => [new ValidVatId]];
        $data = ['vat_id' => 'EL123456789123678912'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test vatid is not valid (too long).
     */
    public function test_vat_is_to_long_valid()
    {
        $rules = ['vat_id' => [new ValidVatId]];
        $data = ['vat_id' => 'EL1234567891236789123'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
