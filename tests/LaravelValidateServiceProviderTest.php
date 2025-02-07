<?php

namespace Milwad\LaravelValidate\Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LaravelValidateServiceProviderTest extends TestCase
{
    /**
     * Test all lang folders publish successfully.
     */
    public function test_all_lang_folders_publish_successfully()
    {
        $langs = File::directories(__DIR__.'/../src/lang');

        foreach ($langs as $lang) {
            $lang = Str::after($lang, 'lang');
            $lang = Str::replace('\\', '', $lang);
            $lang = Str::replace('/', '', $lang);

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
        $this->artisan('vendor:publish', [
            '--tag' => 'laravel-validate-config',
        ]);

        $this->assertFileExists(config_path('laravel-validate.php'));
    }
}
