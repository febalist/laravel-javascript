<?php

namespace Febalist\Laravel\JavaScript;

use Illuminate\Support\ServiceProvider;

class JavaScriptServiceProvider extends ServiceProvider
{
    public function boot()
    {
        javascript([
            'env' => config('app.env'),
            'debug' => config('app.debug'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/javascript.php', 'javascript');

        require_once __DIR__.'/helpers.php';
    }
}
