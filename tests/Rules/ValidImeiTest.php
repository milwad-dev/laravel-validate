<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidImei;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidImeiTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test imei is valid.
     *
     * @test
     *
     * @return void
     */
    public function imei_is_valid()
    {
        $rules = ['imei' => [new ValidImei()]];
        $data = ['imei' => '354809104295874'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test imei is not valid.
     *
     * @test
     *
     * @return void
     */
    public function imei_is_not_valid()
    {
        $rules = ['imei' => [new ValidImei()]];
        $data = ['imei' => '80484080484'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
