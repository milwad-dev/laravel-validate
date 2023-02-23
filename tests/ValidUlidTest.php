<?php

namespace Milwad\LaravelValidate\Tests;

class ValidUlidTest extends BaseTest
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
     * Test slug is valid.
     *
     * @test
     * @return void
     */
    public function slug_is_valid()
    {
        $rules = ['slug' => [new ValidUlidTest()]];
        $data = ['slug' => 'milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test slug is not valid.
     *
     * @test
     * @return void
     */
    public function slug_is_not_valid()
    {
        $rules = ['slug' => [new ValidUlidTest()]];
        $data = ['slug' => 'milwad_dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}