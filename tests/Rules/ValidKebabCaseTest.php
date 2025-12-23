<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidKebabCase;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidKebabCaseTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidKebabCase::class;

    private string $validData = 'milwad-dev';

    private string $invalidData = 'milwadDev';
}
