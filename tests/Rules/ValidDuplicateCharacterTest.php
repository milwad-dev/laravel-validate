<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDuplicateCharacter;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidDuplicateCharacterTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidDuplicateCharacter::class;

    private string $validData = '1,2,3,4,5,6,7,8,9';

    private string $invalidData = '1,2,2,3,3,3,4,5,6,7,8,9';
}
