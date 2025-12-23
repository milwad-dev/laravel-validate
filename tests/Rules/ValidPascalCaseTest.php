<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPascalCase;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidPascalCaseTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidPascalCase::class;

    private string $validData = 'MilwadDev';

    private string $invalidData = 'milwadDev';
}
