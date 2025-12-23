<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidPattern;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidPatternTest extends TestCase
{
    use RuleTestTrait;

    private string $key = 'numbers';

    private string $validData = '4444-4444-4444';

    private string $invalidData = '44444-4444-44444';

    protected function setRules(): array
    {
        return [$this->key => [new ValidPattern(4)]];
    }
}
