<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidUlid;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidUlidTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidUlid::class;

    private string $validData = '01ARZ3NDEKTSV4RRFFQ69G5FAV';

    private string $invalidData = '01ARZ3NDEKTSV4RRFFQ69G5FA';
}
