<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidHtmlTag;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidHtmlTagTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidHtmlTag::class;

    private string $validData = '<h1></h1>';

    private string $invalidData = 'milwad-dev';
}
