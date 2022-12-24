<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidUrl;

class ValidUrlTest extends BaseTest
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
     * Test url is valid.
     *
     * @test
     * @return void
     */
    public function url_is_valid()
    {
        $rules = ['url' => [new ValidUrl()]];
        $data = ['url' => 'https://github.com/milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
