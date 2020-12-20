<?php

namespace Febalist\Laravel\JavaScript;

use Febalist\Laravel\JavaScript\Http\Middleware\GlobalJavaScript;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class JavaScriptServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app('router')->pushMiddlewareToGroup('web', GlobalJavaScript::class);

        foreach (Arr::wrap(config('javascript.bind_js_vars_to_this_view')) as $view) {
            if (View::exists($view)) {
                app('events')->listen("composing: {$view}", function () {
                    app(JavaScript::class)->render();
                });

                break;
            }
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/javascript.php', 'javascript');

        $this->app->singleton(JavaScript::class, function () {
            return new JavaScript();
        });
    }
}
