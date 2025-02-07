<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidImei;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidImeiTest extends TestCase
{
    /**
     * Test imei is valid.
     */
    public function test_imei_is_valid()
    {
        $rules = ['imei' => [new ValidImei]];
        $data = ['imei' => '354809104295874'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test imei is not valid.
     */
    public function test_imei_is_not_valid()
    {
        $rules = ['imei' => [new ValidImei]];
        $data = ['imei' => '80484080484'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
