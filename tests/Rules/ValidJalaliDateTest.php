<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidJalaliDate;
use Milwad\LaravelValidate\Tests\BaseTest;

class ValidJalaliDateTest extends BaseTest
{
    /**
     * Test jalali date is correct.
     *
     * @test
     *
     * @return void
     */
    public function jalali_date_is_correct()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate()]];
        $data = ['jalali_date' => '1384/8/25'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test jalali date is not correct.
     *
     * @test
     *
     * @return void
     */
    public function jalali_date_is_not_correct()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate()]];
        $data = ['jalali_date' => '2016/15/25'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test jalali date is not string.
     *
     * @test
     *
     * @return void
     */
    public function jalali_date_is_not_string()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate()]];
        $data = ['jalali_date' => ['2016/15/25']];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test jalali date is correct with special separator.
     *
     * @test
     *
     * @return void
     */
    public function jalali_date_is_correct_with_special_separator()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate('-')]];
        $data = ['jalali_date' => '1384-8-25'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }
}
