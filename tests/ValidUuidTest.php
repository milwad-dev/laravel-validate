<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidUuid;

class ValidUuidTest extends BaseTest
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
     * Test uuid is valid.
     *
     * @test
     * @return void
     */
    public function uuid_is_valid()
    {
        $rules = ['uuid' => [new ValidUuid()]];
        $data = ['uuid' => '123e4567-e89b-12d3-a456-426655440000'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
