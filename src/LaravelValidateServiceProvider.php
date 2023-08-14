<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\ServiceProvider;

class LaravelValidateServiceProvider extends ServiceProvider
{
    /**
     * Languages names.
     *
     * @var array|string[]
     */
    public array $langs = [
        'ar',
        'az',
        'ca',
        'de',
        'el',
        'en',
        'es',
        'fa',
        'fr',
        'hi',
        'id',
        'It',
        'ja',
        'ko',
        'ku_so',
        'mk',
        'pt_BR',
        'ru',
        'si',
        'sv',
        'tr',
        'uk',
        'zh_CN',
    ];

    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishLangFiles();
            $this->publishConfigFile();
        }

        //        $this->loadValidations();

        $this->loadTranslationsFrom(__DIR__.'/lang', 'validation');
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-validate.php', 'laravel-validate');
    }

    /**
     * Publish lang files.
     */
    private function publishLangFiles(): void
    {
        foreach ($this->langs as $lang) {
            $this->publishes([
                __DIR__."/lang/$lang" => lang_path($lang),
            ], "validate-lang-$lang");
        }
    }

    /**
     * Publish config file.
     *
     * @return void
     */
    private function publishConfigFile()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-validate.php' => config_path('laravel-validate.php'),
        ], 'laravel-validate-config');
    }
}
