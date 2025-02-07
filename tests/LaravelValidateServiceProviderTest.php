<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;

class LaravelValidateServiceProviderTest extends TestCase
{
    /**
     * Test all lang folders publish successfully.
     */
    public function test_all_lang_folders_publish_successfully()
    {
        $langs = (new LaravelValidateServiceProvider(app()))->langs;

        foreach ($langs as $lang) {
            $this->artisan('vendor:publish', [
                '--tag' => "validate-lang-$lang",
            ]);

            $this->assertDirectoryExists(lang_path($lang));
        }
    }

    /**
     * Test config file publish successful.
     */
    public function test_config_file_publish_successful()
    {
        $this->withoutExceptionHandling();
        $this->artisan('vendor:publish', [
            '--tag' => 'laravel-validate-config',
        ]);

        $this->assertFileExists(config_path('laravel-validate.php'));
    }
}
