<?php

namespace App\Http\Middleware;

use Behamin\BResources\Resources\BasicResource;
use Closure;
use Illuminate\Http\Request;

class CheckProxyToken
{
    protected $tokens;

    public function __construct()
    {
        $this->tokens = config('proxy.tokens');
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('X-PROXY-TOKEN') || !in_array($request->header('X-PROXY-TOKEN'), $this->tokens, true)) {
            return response(new BasicResource(['error_message' => trans('exception.access_denied')]), 401);
        }
        return $next($request);
    }
}
