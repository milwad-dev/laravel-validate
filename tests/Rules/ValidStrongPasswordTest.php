<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidStrongPassword;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidStrongPasswordTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidStrongPassword::class;

    private string $validData = 'Milwad123!';

    private string $invalidData = 'Milwad123';
}
