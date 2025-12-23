<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDuplicate;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidDuplicateNumberTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidDuplicate::class;

    private int $validData = 123456;

    private int $invalidData = 1123456;
}
