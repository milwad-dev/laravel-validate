<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidSlug;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidSlugTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test slug is valid.
     *
     * @test
     *
     * @return void
     */
    public function slug_is_valid()
    {
        $rules = ['slug' => [new ValidSlug()]];
        $data = ['slug' => 'milwad-dev'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test slug is not valid.
     *
     * @test
     *
     * @return void
     */
    public function slug_is_not_valid()
    {
        $rules = ['slug' => [new ValidSlug()]];
        $data = ['slug' => 'milwad_dev'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
