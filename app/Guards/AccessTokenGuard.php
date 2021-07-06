<?php


namespace App\Guards;


use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class AccessTokenGuard implements Guard
{
    use GuardHelpers;

    private $inputKey = '';
    private $storageKey = '';
    private $request;
    private $validApp;
    private $token;
    /**
     * @var array|string|null
     */
    private $app_id;

    public function __construct(UserProvider $provider, Request $request, $configuration)
    {
        $this->provider = $provider;
        $this->request = $request;
        // key to check in request
        $this->inputKey = $configuration['input_key'] ?? 'X-Proxy-Token';
        // key to check in database
        $this->storageKey = $configuration['storage_key'] ?? 'X-Proxy-Token';

        $this->token = $this->request->header($this->inputKey);
        $this->app_id = $this->request->header('App-Id');

        $this->checkAppToken();

        $request->request->add(['created_by_app' => $this->validApp]);
        $request->request->add(['app_id' => $this->app_id]);

    }

    public function check(): bool
    {
        return $this->validApp;
    }

    /**
     * Get the token for the current request.
     * @return string
     */
    public function getTokenForRequest()
    {
        $token = $this->request->query($this->inputKey);

        if (empty($token)) {
            $token = $this->request->input($this->inputKey);
        }

        if (empty($token)) {
            $token = $this->request->bearerToken();
        }

        return $token;
    }

    /**
     * Validate a user's credentials.
     *
     * @param array $credentials
     *
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        if (empty($credentials[$this->inputKey])) {
            return false;
        }

        $credentials = [$this->storageKey => $credentials[$this->inputKey]];

        if ($this->provider->retrieveByCredentials($credentials)) {
            return true;
        }

        return false;
    }

    public function user()
    {
        // TODO: Implement user() method.
    }


    private function checkAppToken()
    {
        $apps = empty(config('apps')) ? [null] : config('apps');

        $validApp = false;
        foreach ($apps as $app) {
            if ($this->token == $app["KEY"]) {
                $validApp = true;
                $this->appName = $app["NAME"];
            }
        }
        $this->validApp = $validApp;
    }
}
