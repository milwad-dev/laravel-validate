<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDomain;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidDomainTest extends TestCase
{
    /**
     * Test domain is valid.
     */
    public function test_domain_is_valid()
    {
        $rules = ['domain' => [new ValidDomain]];
        $data = ['domain' => 'github.com'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test domain is not valid.
     */
    public function test_domain_is_not_valid()
    {
        $rules = ['domain' => [new ValidDomain]];
        $data = ['domain' => 'github/com'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
