<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;
use Milwad\LaravelValidate\Rules\ValidGithubUsername;
use Milwad\LaravelValidate\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidGithubUsernameTest extends TestCase
{
    public static function validUsernames(): array
    {
        return [['milwad-dev'], ['a'], ['A1'], ['torvalds'], ['x'.str_repeat('a', 38)]];
    }

    public static function invalidUsernames(): array
    {
        return [
            'leading hyphen' => ['-milwad'],
            'trailing hyphen' => ['milwad-'],
            'double hyphen' => ['mil--wad'],
            'underscore' => ['milwad_dev'],
            'period' => ['milwad.dev'],
            '40 characters' => ['x'.str_repeat('a', 39)],
            'at sign' => ['@milwad'],
            'space' => ['milwad dev'],
            'trailing newline' => ["milwad\n"],
        ];
    }

    #[DataProvider('validUsernames')]
    public function test_github_username_is_valid(string $username)
    {
        $this->assertTrue($this->validate($username));
    }

    #[DataProvider('invalidUsernames')]
    public function test_github_username_is_not_valid(string $username)
    {
        $this->assertFalse($this->validate($username));
    }

    public function test_github_username_with_at_sign()
    {
        $rule = new ValidGithubUsername(true);

        $this->assertTrue($rule->passes('username', '@milwad-dev'));
        $this->assertTrue($rule->passes('username', 'milwad-dev'));
        $this->assertFalse($rule->passes('username', '@@milwad'));
        $this->assertFalse($rule->passes('username', '@'));
    }

    public function test_non_string_github_username_is_not_valid()
    {
        foreach ([123, ['milwad'], null] as $value) {
            $this->assertFalse((new ValidGithubUsername)->passes('username', $value));
        }
    }

    public function test_github_username_as_string_rule()
    {
        config(['laravel-validate.using_container' => true]);
        (new LaravelValidateServiceProvider($this->app))->boot();

        $this->assertFalse($this->app['validator']->make(['u' => '@milwad'], ['u' => 'ValidGithubUsername'])->passes());
        $this->assertTrue($this->app['validator']->make(['u' => '@milwad'], ['u' => 'ValidGithubUsername:at'])->passes());
    }

    private function validate(string $username): bool
    {
        return $this->app['validator']
            ->make(['username' => $username], ['username' => [new ValidGithubUsername]])
            ->passes();
    }
}
