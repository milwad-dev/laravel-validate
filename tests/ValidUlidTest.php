<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidUlid;

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
     * Test ulid is valid.
     *
     * @test
     * @return void
     */
    public function ulid_is_valid()
    {
        $rules = ['ulid' => [new ValidUlid()]];
        $data = ['ulid' => '01ARZ3NDEKTSV4RRFFQ69G5FAV'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test ulid is not valid.
     *
     * @test
     * @return void
     */
    public function ulid_is_not_valid()
    {
        $rules = ['slug' => [new ValidUlid()]];
        $data = ['slug' => 'milwad_dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}