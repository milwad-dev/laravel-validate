<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCapitalCharWithNumber;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidCapitalCharWithNumberTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidCapitalCharWithNumber::class;

    private string $validData = 'MILWAD-84';

    private string $invalidData = 'Milwad-84';
}
