<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidSlug;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidSlugTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidSlug::class;

    private string $validData = 'milwad-dev';

    private string $invalidData = 'milwad_dev';
}
