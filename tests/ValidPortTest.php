<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidPort;

class ValidPortTest extends BaseTest
{
    /**
     * Set up.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test port is valid.
     *
     * @test
     * @return void
     */
    public function port_is_valid()
    {
        $rules = ['port' => [new ValidPort()]];
        $data = ['port' => '8080'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
