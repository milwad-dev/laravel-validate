<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidHashtag;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidHashtagTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidHashtag::class;

    private string $validData = '#laravel';

    private string $invalidData = 'laravel';
}
