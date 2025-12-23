<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidJwt;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidJwtTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidJwt::class;

    private string $validData = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEyMzQ1Njc4OTAiLCJuYW1lIjoiSm9obiBEb2UiLCJhZG1pbiI6dHJ1ZSwiZXhwIjoxNTgyNjE2MDA1fQ.umEYVDP_kZJGCI3tkU9dmq7CIumEU8Zvftc-klp-334';

    private string $invalidData = '1ZSwiZXhwIjoxNTgyNjE2MDA1fQ.umEYVDP_kZJGCI3tkU9dmq7CIumEU8Zvftc-klp-334';
}
