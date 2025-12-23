<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidBitcoinAddress;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidBitcoinAddressTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidBitcoinAddress::class;

    private string $validData = '1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY';

    private string $invalidData = 'loremipsum';
}
