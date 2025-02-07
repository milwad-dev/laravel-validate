<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidSlug;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidSlugTest extends TestCase
{
    /**
     * Test slug is valid.
     */
    public function test_slug_is_valid()
    {
        $rules = ['slug' => [new ValidSlug]];
        $data = ['slug' => 'milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test slug is not valid.
     */
    public function test_slug_is_not_valid()
    {
        $rules = ['slug' => [new ValidSlug]];
        $data = ['slug' => 'milwad_dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
