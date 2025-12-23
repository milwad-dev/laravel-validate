<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidHexColor;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidHexColorTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidHexColor::class;

    private string $validData = '#fcba03';

    private string $invalidData = 'laravel-framework';
}
