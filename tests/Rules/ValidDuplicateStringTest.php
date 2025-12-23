<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDuplicate;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidDuplicateStringTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidDuplicate::class;

    private string $validData = 'milwad';

    private string $invalidData = 'millwad';
}
