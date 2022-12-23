<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidHtmlTag;

class ValidHtmlTagTest extends BaseTest
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
     * Test html tag is valid.
     *
     * @test
     * @return void
     */
    public function html_tag_is_valid()
    {
        $rules = ['even_number' => [new ValidHtmlTag()]];
        $data = ['even_number' => '<h1></h1>'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
