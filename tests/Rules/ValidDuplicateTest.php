<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidDuplicate;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidDuplicateTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test duplicate number is valid.
     *
     * @test
     *
     * @return void
     */
    public function duplicate_number_is_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate()]];
        $data = ['duplicate' => 123456];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test duplicate number is not valid.
     *
     * @test
     *
     * @return void
     */
    public function duplicate_number_is_not_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate()]];
        $data = ['duplicate' => 1123456];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test duplicate string is valid.
     *
     * @test
     *
     * @return void
     */
    public function duplicate_string_is_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate()]];
        $data = ['duplicate' => 'milwad'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test duplicate string is not valid.
     *
     * @test
     *
     * @return void
     */
    public function duplicate_string_is_not_valid()
    {
        $rules = ['duplicate' => [new ValidDuplicate()]];
        $data = ['duplicate' => 'millwad'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
