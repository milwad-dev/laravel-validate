<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidHtmlTag;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidHtmlTagTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test html tag is valid.
     *
     * @test
     *
     * @return void
     */
    public function html_tag_is_valid()
    {
        $rules = ['html_tag' => [new ValidHtmlTag]];
        $data = ['html_tag' => '<h1></h1>'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test html tag is not valid.
     *
     * @test
     *
     * @return void
     */
    public function html_tag_is_not_valid()
    {
        $rules = ['html_tag' => [new ValidHtmlTag]];
        $data = ['html_tag' => 'milwad-dev'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
