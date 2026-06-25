<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidNoHtml;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidNoHtmlTest extends TestCase
{
    /**
     * Test no HTML is valid.
     */
    public function test_no_html_is_valid(): void
    {
        $rules = ['no_html' => [new ValidNoHtml]];
        $data = ['no_html' => 'Milwad Khosravi'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test no HTML is valid on strict mode.
     */
    public function test_no_html_is_valid_on_strict_mode(): void
    {
        $rules = ['no_html' => [new ValidNoHtml(true)]];
        $data = ['no_html' => '&lt;script&gt;alert("Milwad Khosravi")&lt;/script&gt;'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test no HTML is not valid.
     */
    public function test_no_html_is_not_valid(): void
    {
        $rules = ['no_html' => [new ValidNoHtml]];
        $data = ['no_html' => '<h1>Milwad Khosravi</html>'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
