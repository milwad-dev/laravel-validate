<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidIpAddressIPV6;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidIpAddressIPV6Test extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidIpAddressIPV6::class;

    private string $validData = '2001:db8:3333:4444:5555:6666:7777:8888';

    private string $invalidData = '12345671213145131212';
}
