<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCamelCase;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidCamelCaseTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidCamelCase::class;

    private string $validData = 'milwadDev';

    private string $invalidData = 'milwad_dev';
}
