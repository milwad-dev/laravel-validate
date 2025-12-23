<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidSnakeCase;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidSnakeCaseTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidSnakeCase::class;

    private string $validData = 'milwad_dev';

    private string $invalidData = 'milwadDev';
}
