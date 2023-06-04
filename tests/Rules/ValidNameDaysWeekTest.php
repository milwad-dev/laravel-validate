<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Milwad\LaravelValidate\Rules\ValidNameDaysWeek;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidNameDaysWeekTest extends BaseTest
{
    /**
     * Set up.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test name day is valid.
     *
     * @test
     *
     * @return void
     */
    public function name_day_is_valid()
    {
        $rules = ['name_day' => [new ValidNameDaysWeek()]];
        $data = ['name_day' => 'monday'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test name day is not valid.
     *
     * @test
     *
     * @return void
     */
    public function name_day_is_not_valid()
    {
        $rules = ['name_day' => [new ValidNameDaysWeek()]];
        $data = ['name_day' => 'day'];
        $passes = Validator::make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
