<?php

namespace App\Http\Middleware;

use App\Exceptions\ClientException;
use Closure;
use Illuminate\Http\Request;

class CheckAppId
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws ClientException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->headers->has('App-Id')) {
            throw new ClientException(__('exception.app_id_required'));
        }
        return $next($request);
    }
}
