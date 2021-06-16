<?php

namespace App\Providers;

use App\Guards\AccessTokenGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('X-Proxy-Token', function ($app, $name, array $config) {
            // automatically build the DI, put it as reference
            $userProvider = app(TokenToAppProvider::class);
            $request = app('request');

            $config['input_key'] = env('input_key', 'X-Proxy-Token');

            return new AccessTokenGuard($userProvider, $request, $config);
        });
    }
}
