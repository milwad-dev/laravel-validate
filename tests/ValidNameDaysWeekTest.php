<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidNameDaysWeek;

class ValidNameDaysWeekTest extends BaseTest
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
     * Test name day is valid.
     *
     * @test
     * @return void
     */
    public function name_day_is_valid()
    {
        $rules = ['name_day' => [new ValidNameDaysWeek()]];
        $data = ['name_day' => 'monday'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
