<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPort;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidPortTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test port is valid.
     *
     * @test
     *
     * @return void
     */
    public function port_is_valid()
    {
        $rules = ['port' => [new ValidPort]];
        $data = ['port' => '8080'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test port is not valid.
     *
     * @test
     *
     * @return void
     */
    public function port_is_not_valid()
    {
        $rules = ['port' => [new ValidPort]];
        $data = ['port' => '158754'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
