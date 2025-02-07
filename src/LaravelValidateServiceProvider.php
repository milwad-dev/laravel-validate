<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Milwad\LaravelValidate\Utils\CountryPhoneCallback;

class LaravelValidateServiceProvider extends ServiceProvider
{
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
    protected function publishLangFiles(): void
    {
        $langs = File::directories(__DIR__.'/lang');

        foreach ($langs as $lang) {
            $this->publishes([
                __DIR__."/lang/$lang" => lang_path($lang),
            ], "validate-lang-$lang");
        }
    }

    /**
     * Publish config file.
     */
    protected function publishConfigFile(): void
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
