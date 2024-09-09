<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidHashtag;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidHashtagTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test text has hashtag.
     *
     * @test
     *
     * @return void
     */
    public function text_has_hashtag()
    {
        $rules = ['hashtag' => [new ValidHashtag]];
        $data = ['hashtag' => '#laravel'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test text has no hashtag.
     *
     * @test
     *
     * @return void
     */
    public function text_has_no_hashtag()
    {
        $rules = ['hashtag' => [new ValidHashtag]];
        $data = ['hashtag' => 'laravel'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
