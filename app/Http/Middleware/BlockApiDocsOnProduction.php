<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockApiDocsOnProduction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $env = config('app.env', 'production');
        $validEnv = ['local', 'development'];
        if (in_array($env, $validEnv, true)) {
            return $next($request);
        }
        return abort(403, 'Access denied');
    }
}
