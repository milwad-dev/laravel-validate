<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidEvenNumber;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidEvenNumberTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test number is even.
     *
     * @test
     *
     * @return void
     */
    public function check_number_is_even()
    {
        $rules = ['even_number' => [new ValidEvenNumber]];
        $data = ['even_number' => '1024'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test number is not even.
     *
     * @test
     *
     * @return void
     */
    public function check_number_is_not_even()
    {
        $rules = ['even_number' => [new ValidEvenNumber]];
        $data = ['even_number' => '1025'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
