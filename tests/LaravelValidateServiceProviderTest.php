<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\LaravelValidateServiceProvider;

class LaravelValidateServiceProviderTest extends BaseTest
{
    /**
     * Test all lang folders publish successfully.
     *
     * @test
     * @return void
     */
    public function all_lang_folders_publish_successfully()
    {
        $langs = (new LaravelValidateServiceProvider(app()))->langs;

        foreach ($langs as $lang) {
            $this->artisan('vendor:publish', [
                '--tag' => "validate-lang-$lang"
            ]);

            $this->assertDirectoryExists(lang_path($lang));
        }
    }
}
