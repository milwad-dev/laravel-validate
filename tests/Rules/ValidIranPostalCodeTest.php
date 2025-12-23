<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIranPostalCode;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidIranPostalCodeTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidIranPostalCode::class;

    private string $validData = '3354355599';

    private string $invalidData = '1111111111';
}
