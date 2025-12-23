<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidUrl;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidUrlTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidUrl::class;

    private string $validData = 'https://github.com/milwad-dev';

    private string $invalidData = 'milwad-dev';
}
