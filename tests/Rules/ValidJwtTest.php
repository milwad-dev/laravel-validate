<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidJwt;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidJwtTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test jwt is valid.
     *
     * @test
     *
     * @return void
     */
    public function jwt_is_valid()
    {
        $rules = ['jwt' => [new ValidJwt]];
        $data = ['jwt' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEyMzQ1Njc4OTAiLCJuYW1lIjoiSm9obiBEb2UiLCJhZG1pbiI6dHJ1ZSwiZXhwIjoxNTgyNjE2MDA1fQ.umEYVDP_kZJGCI3tkU9dmq7CIumEU8Zvftc-klp-334'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test jwt is not valid.
     *
     * @test
     *
     * @return void
     */
    public function jwt_is_not_valid()
    {
        $rules = ['jwt' => [new ValidJwt]];
        $data = ['jwt' => '1ZSwiZXhwIjoxNTgyNjE2MDA1fQ.umEYVDP_kZJGCI3tkU9dmq7CIumEU8Zvftc-klp-334'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
