<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;
use Milwad\LaravelValidate\Rules\ValidXHandle;
use Milwad\LaravelValidate\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidXHandleTest extends TestCase
{
    public static function validHandles(): array
    {
        return [['milwad_dev'], ['a'], ['MilwadDev'], ['_84_'], ['x'.str_repeat('a', 14)]];
    }

    public static function invalidHandles(): array
    {
        return [
            'hyphen' => ['milwad-dev'],
            'period' => ['milwad.dev'],
            '16 characters' => ['x'.str_repeat('a', 15)],
            'at sign' => ['@milwad'],
            'space' => ['milwad dev'],
            'trailing newline' => ["milwad\n"],
        ];
    }

    #[DataProvider('validHandles')]
    public function test_x_handle_is_valid(string $handle)
    {
        $this->assertTrue($this->validate($handle));
    }

    #[DataProvider('invalidHandles')]
    public function test_x_handle_is_not_valid(string $handle)
    {
        $this->assertFalse($this->validate($handle));
    }

    public function test_x_handle_with_at_sign()
    {
        $rule = new ValidXHandle(true);

        $this->assertTrue($rule->passes('handle', '@milwad_dev'));
        $this->assertTrue($rule->passes('handle', 'milwad_dev'));
        $this->assertFalse($rule->passes('handle', '@@milwad'));
        $this->assertFalse($rule->passes('handle', '@'));
    }

    public function test_non_string_x_handle_is_not_valid()
    {
        foreach ([123, ['milwad'], null] as $value) {
            $this->assertFalse((new ValidXHandle)->passes('handle', $value));
        }
    }

    public function test_x_handle_as_string_rule()
    {
        config(['laravel-validate.using_container' => true]);
        (new LaravelValidateServiceProvider($this->app))->boot();

        $this->assertFalse($this->app['validator']->make(['h' => '@milwad'], ['h' => 'ValidXHandle'])->passes());
        $this->assertTrue($this->app['validator']->make(['h' => '@milwad'], ['h' => 'ValidXHandle:at'])->passes());
    }

    private function validate(string $handle): bool
    {
        return $this->app['validator']
            ->make(['handle' => $handle], ['handle' => [new ValidXHandle]])
            ->passes();
    }
}
