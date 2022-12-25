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
        $this->publishes([__DIR__ . '/../lang/en' => base_path('lang')], 'lang-en');
        $this->publishes([__DIR__ . '/../lang/fa' => base_path('lang')], 'lang-fa');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'validation');
    }
}
