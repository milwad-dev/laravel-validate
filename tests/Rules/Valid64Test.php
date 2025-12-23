<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidBase64;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class Valid64Test extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidBase64::class;

    private string $validData = 'bWlsd2Fk'; // milwad

    private string $invalidData = 'milwad';
}
