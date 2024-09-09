<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDomain;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidDomainTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test domain is valid.
     *
     * @test
     *
     * @return void
     */
    public function domain_is_valid()
    {
        $rules = ['domain' => [new ValidDomain]];
        $data = ['domain' => 'github.com'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test domain is not valid.
     *
     * @test
     *
     * @return void
     */
    public function domain_is_not_valid()
    {
        $rules = ['domain' => [new ValidDomain]];
        $data = ['domain' => 'github/com'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
