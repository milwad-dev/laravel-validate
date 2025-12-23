<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCartNumberIran;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidCartNumberIranTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidCartNumberIran::class;

    private string $validData = '6280231331655562';

    private string $invalidData = '1234123412341234';
}
