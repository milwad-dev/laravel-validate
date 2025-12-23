<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDiscordUsername;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidDiscordUsernameTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidDiscordUsername::class;

    private string $validData = 'Milwad#2134';

    private string $invalidData = '#2134';
}
