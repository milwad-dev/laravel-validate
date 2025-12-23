<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidUuid;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidUuidTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidUuid::class;

    private string $validData = '123e4567-e89b-12d3-a456-426655440000';

    private string $invalidData = '5050';
}
