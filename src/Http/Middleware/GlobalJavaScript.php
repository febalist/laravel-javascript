<?php

namespace Febalist\Laravel\JavaScript\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GlobalJavaScript
{
    public function handle(Request $request, Closure $next)
    {
        javascript([
            'env' => config('app.env'),
            'debug' => config('app.debug'),
        ]);

        return $next($request);
    }
}
