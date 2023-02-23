<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidBase64;
use Milwad\LaravelValidate\Rules\ValidDuplicate;

class ValidDuplicateTest extends BaseTest
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
     * Test duplicate number is valid.
     *
     * @test
     * @return void
     */
    public function duplicate_number_is_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate()]];
        $data = ['duplicate' => 123456];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test base64 is not valid.
     *
     * @test
     * @return void
     */
    public function base64_is_not_valid()
    {
        $rules = ['base64' => [new ValidBase64()]];
        $data = ['base64' => 'milwad'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}