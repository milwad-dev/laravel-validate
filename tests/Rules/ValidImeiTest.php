<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidImei;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidImeiTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidImei::class;

    private string $validData = '354809104295874';

    private string $invalidData = '80484080484';
}
