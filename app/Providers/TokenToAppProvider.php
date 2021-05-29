<?php


namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Str;

class TokenToAppProvider implements UserProvider
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function retrieveById($identifier)
    {
        return $this->user->find($identifier);
    }

    public function retrieveByToken($identifier, $device)
    {
        return $device ?: null;
    }

    public function updateRememberToken(Authenticatable $user, $device)
    {
        // update via remember token not necessary
    }

    public function retrieveByCredentials(array $credentials)
    {
        // implementation upto user.
        // how he wants to implement -
        // let's try to assume that the credentials ['username', 'password'] given
        $user = $this->user;
        foreach ($credentials as $credentialKey => $credentialValue) {
            if (!Str::contains($credentialKey, 'password')) {
                $user->where($credentialKey, $credentialValue);
            }
        }

        return $user->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plain = $credentials['password'];

        return app('hash')->check($plain, $user->getAuthPassword());
    }
}
