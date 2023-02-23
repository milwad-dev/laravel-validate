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
        $this->publishes([__DIR__.'/Lang/en' => base_path('lang/en')], 'validate-lang-en');
        $this->publishes([__DIR__.'/Lang/fa' => base_path('lang/fa')], 'validate-lang-fa');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'validation');
    }
}
