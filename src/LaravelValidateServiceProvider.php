<?php

namespace Milwad\LaravelValidate;

use Illuminate\Support\ServiceProvider;

class LaravelValidateServiceProvider extends ServiceProvider
{
    /**
     * Register files.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([__DIR__ . '/../validation' => lang_path('/')], 'lang');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'validation');
    }
}
