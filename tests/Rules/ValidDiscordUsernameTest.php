<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidDiscordUsername;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidDiscordUsernameTest extends TestCase
{
    /**
     * Test discord username is valid.
     */
    public function test_discord_username_is_valid()
    {
        $rules = ['discord_username' => [new ValidDiscordUsername]];
        $data = ['discord_username' => 'Milwad#2134'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test discord username is not valid.
     */
    public function test_discord_username_is_not_valid()
    {
        $rules = ['discord_username' => [new ValidDiscordUsername]];
        $data = ['discord_username' => '#2134'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}
