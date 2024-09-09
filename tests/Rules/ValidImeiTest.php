<?php

namespace Milwad\LaravelValidate\Tests\Rules;

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
        $rules = ['imei' => [new ValidImei]];
        $data = ['imei' => '354809104295874'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

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
        $rules = ['imei' => [new ValidImei]];
        $data = ['imei' => '80484080484'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
