<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientAppResource;
use App\Http\Resources\ClientAppResourceCollection;
use App\Interfaces\Repositories\ClientAppRepositoryInterface;
use App\Models\ClientApp;
use Illuminate\Http\Request;

class ClientAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ClientAppResourceCollection
     */
    public function index()
    {
        return new ClientAppResourceCollection(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ClientAppResource
     */
    public function store(Request $request)
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): ClientAppResource
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->update($id,$request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): ClientAppResource
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->destroy($id)]);
    }
}
