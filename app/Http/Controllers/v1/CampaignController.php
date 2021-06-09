<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CampaignResource;
use App\Http\Resources\CampaignResourceCollection;
use App\Interfaces\Repositories\CampaignRepositoryInterface;
use App\Models\Campaign;
use Behamin\BResources\Traits\CollectionResource;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CampaignResourceCollection
     */
    public function index(): CampaignResourceCollection
    {
        return new CampaignResourceCollection(["data" => app()->make(CampaignRepositoryInterface::class)
            ->index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CampaignResource
     */
    public function store(Request $request): CampaignResource
    {
        return new CampaignResource(["data" => app()->make(CampaignRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return CampaignResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id): CampaignResource
    {
        return new CampaignResource(["data" => app()->make(CampaignRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return CampaignResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): CampaignResource
    {
        return new CampaignResource(["data" => app()->make(CampaignRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return CampaignResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): CampaignResource
    {
        return new CampaignResource(["data" => app()->make(CampaignRepositoryInterface::class)
            ->destroy($id)]);
    }
}
