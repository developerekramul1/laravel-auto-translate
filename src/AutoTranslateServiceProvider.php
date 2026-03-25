<?php

namespace Developerekramul\AutoTranslate;

use Illuminate\Support\ServiceProvider;

class AutoTranslateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/autotranslate.php', 'autotranslate');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/autotranslate.php' => config_path('autotranslate.php'),
        ], 'config');
    }
}