<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\ServiceProvider;
use Milwad\LaravelValidate\Lang\Lang;

class LaravelValidateServiceProvider extends ServiceProvider
{
    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            foreach ((new Lang) as $lang) {
                $this->publishes([
                    __DIR__."/Lang/$lang" => base_path("lang/$lang"),
                ], "validate-lang-$lang");
            }
        }

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'validation');
    }
}
