<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidBase64;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidBase64Test extends TestCase
{
    /**
     * Test base64 is valid.
     */
    public function test_base64_is_valid(): void
    {
        $rules = ['base64' => [new ValidBase64]];
        $data = ['base64' => 'bWlsd2Fk']; // milwad
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test base64 is not valid.
     */
    public function test_base64_is_not_valid(): void
    {
        $rules = ['base64' => [new ValidBase64]];
        $data = ['base64' => 'milwad'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
