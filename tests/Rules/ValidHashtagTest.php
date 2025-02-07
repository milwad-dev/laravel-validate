<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidHashtag;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidHashtagTest extends TestCase
{
    /**
     * Test text has hashtag.
     */
    public function test_text_has_hashtag()
    {
        $rules = ['hashtag' => [new ValidHashtag]];
        $data = ['hashtag' => '#laravel'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test text has no hashtag.
     */
    public function test_text_has_no_hashtag()
    {
        $rules = ['hashtag' => [new ValidHashtag]];
        $data = ['hashtag' => 'laravel'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
