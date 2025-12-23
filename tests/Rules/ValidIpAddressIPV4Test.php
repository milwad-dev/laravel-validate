<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIpAddressIPV4;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidIpAddressIPV4Test extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidIpAddressIPV4::class;

    private string $validData = '129.144.50.56';

    private string $invalidData = '123456789';
}
