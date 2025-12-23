<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidCreditCard;
use Milwad\LaravelValidate\Tests\TestCase;
use Milwad\LaravelValidate\Tests\Traits\RuleTestTrait;

class ValidCreditCardTest extends TestCase
{
    use RuleTestTrait;

    private string $rules = ValidCreditCard::class;

    // A sample valid credit card number
    private string $validData = '4111111111111111';

    // A sample invalid credit card number
    private string $invalidData = '1234567812345678';
}
