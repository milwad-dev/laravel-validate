<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidNameDaysWeek;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidNameDaysWeekTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidNameDaysWeek::class;

    private string $validData = 'monday';

    private string $invalidData = 'day';
}
