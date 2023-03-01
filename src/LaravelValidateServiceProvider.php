<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\ServiceProvider;
use Milwad\LaravelValidate\Lang\Lang;

class LaravelValidateServiceProvider extends ServiceProvider
{
    /**
     * Languages names.
     *
     * @var array|string[]
     */
    protected array $langs = [
        'ar',
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
            foreach ($this->langs as $lang) {
                $this->publishes([
                    __DIR__."/Lang/$lang" => base_path("lang/$lang"),
                ], "validate-lang-$lang");
            }
        }

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'validation');
    }
}
