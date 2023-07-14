<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidArrayKeyExists;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidArrayKeyExistsTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test array key exists is valid.
     *
     * @test
     *
     * @return void
     */
    public function array_key_exists_is_valid()
    {
        $rules = ['array' => [new ValidArrayKeyExists()]];
        $data = ['array' => [
            [
                'name' => 'milwad',
                'content' => 'laravel'
            ]
        ]];
        dd((new ValidArrayKeyExists())->passes('array', $data));

        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
