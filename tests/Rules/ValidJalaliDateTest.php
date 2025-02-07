<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidJalaliDate;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidJalaliDateTest extends TestCase
{
    /**
     * Test jalali date is correct.
     */
    public function test_jalali_date_is_correct()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate]];
        $data = ['jalali_date' => '1384/8/25'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test jalali date is not correct.
     */
    public function test_jalali_date_is_not_correct()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate]];
        $data = ['jalali_date' => '2016/15/25'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test jalali date is not string.
     */
    public function test_jalali_date_is_not_string()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate]];
        $data = ['jalali_date' => ['2016/15/25']];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }

    /**
     * Test jalali date is correct with different default character.
     */
    public function test_jalali_date_is_correct_with_different_default_character()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate('-')]];
        $data = ['jalali_date' => '1384-8-25'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test jalali date is not correct with different default character.
     */
    public function test_jalali_date_is_not_correct_with_different_default_character()
    {
        $rules = ['jalali_date' => [new ValidJalaliDate('-')]];
        $data = ['jalali_date' => '2016/15/25'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
