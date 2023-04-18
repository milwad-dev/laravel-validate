<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\Facades\Validator;
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
        'de',
        'en',
        'es',
        'es',
        'fa',
        'fr',
        'hi',
        'It',
        'ja',
        'ko',
        'pt_BR',
        'ru',
        'si',
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

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'validation');
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-validate.php', 'laravel-validate');
    }

    /**
     * Publish lang files.
     */
    private function publishLangFiles(): void
    {
        foreach ($this->langs as $lang) {
            $this->publishes([
                __DIR__."/Lang/$lang" => lang_path($lang),
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

    /**
     * Load validation in container.
     *
     * @return void
     */
    private function loadValidations()
    {
        foreach (config('laravel-validate.rules', []) as $rule) {
            Validator::extend('validate-' . $rule['name'], function ($attribute, $value, $parameters, $validator) use ($rule) {
                $rule = new $rule(...$parameters);

                return $rule->passes($attribute, $value);
            });
        } // Beta
    }
}
