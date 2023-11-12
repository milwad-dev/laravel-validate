<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIranCompanyId;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidIranCompanyIdTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test company id is valid.
     *
     * @test
     *
     * @return void
     */
    public function company_id_is_valid()
    {
        $rules = ['company_id' => [new ValidIranCompanyId()]];
        $data = ['company_id' => '14007650912'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test company id is not valid.
     *
     * @test
     *
     * @return void
     */
    public function company_id_is_not_valid()
    {
        $rules = ['company_id' => [new ValidIranCompanyId()]];
        $data = ['company_id' => '11111111111'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
