<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\ServiceProvider;
use Milwad\LaravelValidate\Utils\CountryPhoneCallback;

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
        'bn',
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
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishLangFiles();
            $this->publishConfigFile();
        }

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
     */
    private function publishConfigFile(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-validate.php' => config_path('laravel-validate.php'),
        ], 'laravel-validate-config');
    }

    /**
     * Boot applications.
     *
     * @throws \Throwable
     */
    public function boot(): void
    {
        $countries = config('laravel-validate.phone-country', []);

        foreach ($countries as $code => $country) {
            CountryPhoneCallback::addValidator($code, $country);
        }
    }
}
