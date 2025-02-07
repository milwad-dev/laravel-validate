<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidUrl;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidUrlTest extends TestCase
{
    /**
     * Test url is valid.
     */
    public function test_url_is_valid()
    {
        $rules = ['url' => [new ValidUrl]];
        $data = ['url' => 'https://github.com/milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test url is not valid.
     */
    public function test_url_is_nor_valid()
    {
        $rules = ['url' => [new ValidUrl]];
        $data = ['url' => 'milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
