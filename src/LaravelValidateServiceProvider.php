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
    protected array $langs = [
        'ar',
        'az',
        'en',
        'fa',
        'fr',
        'hi',
        'It',
        'ja',
        'ko',
        'ru',
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

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'validation');
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-validate.php', 'laravel-validate');
    }

    /**
     * Publish lang files.
     *
     * @return void
     */
    private function publishLangFiles(): void
    {
        foreach ($this->langs as $lang) {
            $this->publishes([
                __DIR__ . "/Lang/$lang" => base_path("lang/$lang"),
            ], "validate-lang-$lang");
        }
    }

    private function publishConfigFile()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-validate.php' => config_path('laravel-validate.php')
        ], 'laravel-validate-config');
    }
}
