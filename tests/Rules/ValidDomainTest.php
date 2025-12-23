<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDomain;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidDomainTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidDomain::class;

    private string $validData = 'github.com';

    private string $invalidData = 'github/com';
}
