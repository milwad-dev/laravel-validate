<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Milwad\LaravelValidate\Utils\CountryLandlineCallback;
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
            $lang = Str::after($lang, 'lang');
            $lang = Str::replace('\\', '', $lang);
            $lang = Str::replace('/', '', $lang);

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

        $landlineCountries = config('laravel-validate.landline-country', []);

        foreach ($landlineCountries as $code => $country) {
            CountryLandlineCallback::addValidator($code, $country);
        }

        // Register rules in container
        if (config('laravel-validate.using_container', false)) {
            $rules = File::files(__DIR__.'/Rules');

            foreach ($rules as $rule) {
                $className = 'Milwad\\LaravelValidate\\Rules\\'.$rule->getBasename('.php');

                Validator::extend(
                    $rule->getFilenameWithoutExtension(),
                    function ($attribute, $value, $parameters, $validator) use ($className) {
                        return (new $className($parameters))->passes($attribute, $value);
                    }
                );
            }
        }
    }
}
