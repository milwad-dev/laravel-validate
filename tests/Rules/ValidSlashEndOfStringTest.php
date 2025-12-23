<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidSlashEndOfString;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidSlashEndOfStringTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidSlashEndOfString::class;

    private string $validData = 'milwad/';

    private string $invalidData = 'milwad';
}
