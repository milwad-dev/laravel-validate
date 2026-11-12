<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;
use Milwad\LaravelValidate\Rules\ValidInstagramHandle;
use Milwad\LaravelValidate\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidInstagramHandleTest extends TestCase
{
    public static function validHandles(): array
    {
        return [['milwad.dev'], ['_milwad_'], ['a'], ['m.i.l'], ['Milwad_Dev.84'], ['x'.str_repeat('a', 29)]];
    }

    public static function invalidHandles(): array
    {
        return [
            'leading period' => ['.milwad'],
            'trailing period' => ['milwad.'],
            'double period' => ['mil..wad'],
            'hyphen' => ['mil-wad'],
            '31 characters' => ['x'.str_repeat('a', 30)],
            'at sign' => ['@milwad'],
            'space' => ['mil wad'],
            'trailing newline' => ["milwad\n"],
        ];
    }

    #[DataProvider('validHandles')]
    public function test_instagram_handle_is_valid(string $handle)
    {
        $this->assertTrue($this->validate($handle));
    }

    #[DataProvider('invalidHandles')]
    public function test_instagram_handle_is_not_valid(string $handle)
    {
        $this->assertFalse($this->validate($handle));
    }

    public function test_instagram_handle_with_at_sign()
    {
        $rule = new ValidInstagramHandle(true);

        $this->assertTrue($rule->passes('handle', '@milwad.dev'));
        $this->assertTrue($rule->passes('handle', 'milwad.dev'));
        $this->assertFalse($rule->passes('handle', '@.milwad'));
        $this->assertFalse($rule->passes('handle', '@'));
    }

    public function test_non_string_instagram_handle_is_not_valid()
    {
        foreach ([123, ['milwad'], null] as $value) {
            $this->assertFalse((new ValidInstagramHandle)->passes('handle', $value));
        }
    }

    public function test_instagram_handle_as_string_rule()
    {
        config(['laravel-validate.using_container' => true]);
        (new LaravelValidateServiceProvider($this->app))->boot();

        $this->assertFalse($this->app['validator']->make(['h' => '@milwad'], ['h' => 'ValidInstagramHandle'])->passes());
        $this->assertTrue($this->app['validator']->make(['h' => '@milwad'], ['h' => 'ValidInstagramHandle:at'])->passes());
    }

    private function validate(string $handle): bool
    {
        return $this->app['validator']
            ->make(['handle' => $handle], ['handle' => [new ValidInstagramHandle]])
            ->passes();
    }
}
