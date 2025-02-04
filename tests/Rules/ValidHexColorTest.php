<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidHexColor;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidHexColorTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test text is valid hex code.
     *
     * @test
     *
     * @return void
     */
    public function text_is_valid_hex_code()
    {
        $rules = ['hex_color' => [new ValidHexColor]];
        $data = ['hex_color' => '#fcba03'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test text is not valid hex code.
     *
     * @test
     *
     * @return void
     */
    public function text_is_not_valid_hex_code()
    {
        $rules = ['hex_color' => [new ValidHexColor]];
        $data = ['hex_color' => 'laravel-framework'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
