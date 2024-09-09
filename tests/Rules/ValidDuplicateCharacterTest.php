<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDuplicateCharacter;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidDuplicateCharacterTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test duplicate characters is valid.
     *
     * @test
     *
     * @return void
     */
    public function duplicate_characters_is_valid()
    {
        $rules = ['duplicate_number' => [new ValidDuplicateCharacter]];
        $data = ['duplicate_number' => '1,2,3,4,5,6,7,8,9'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test duplicate characters is not valid.
     *
     * @test
     *
     * @return void
     */
    public function duplicate_characters_is_not_valid()
    {
        $rules = ['duplicate_number' => [new ValidDuplicateCharacter]];
        $data = ['duplicate_number' => '1,2,2,3,3,3,4,5,6,7,8,9'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
