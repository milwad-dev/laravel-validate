<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCarNumber;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidCarNumberTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidCarNumber::class;

    private string $validData = 'KA01AB1234';

    private string $invalidData = '854128';
}
