<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPort;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidPortTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidPort::class;

    private string $validData = '8080';

    private string $invalidData = '158754';
}
