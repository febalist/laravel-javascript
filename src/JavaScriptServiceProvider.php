<?php

namespace Febalist\Laravel\JavaScript;

use Febalist\Laravel\JavaScript\Http\Middleware\GlobalJavaScript;
use Illuminate\Support\ServiceProvider;

class JavaScriptServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app('router')->pushMiddlewareToGroup('web', GlobalJavaScript::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/javascript.php', 'javascript');

        require_once __DIR__.'/helpers.php';
    }
}
