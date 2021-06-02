<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageConnectToCampaignRequest;
use App\Http\Resources\CampanileResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use Illuminate\Http\Request;

class CampanileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param PackageConnectToCampaignRequest $request
     * @param int $id
     * @return CampanileResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function connect(PackageConnectToCampaignRequest $request, int $id): CampanileResource
    {
        if (!$request->has('campaigns.connect')) {
            throw new \Exception("failed to found campaigns connect");
        }

        $arrayCategories = $request->input("campaigns.connect");

        return new CampanileResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->attachCampanile($arrayCategories, $id)]);
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function disconnect(Request $request, int $id): CampanileResource
    {
        if (!$request->has('campaigns.disconnect')) {
            throw new \Exception("failed to found campaigns disconnect");
        }

        $arrayCategories = $request->input("campaigns.disconnect");

        return new CampanileResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->detachCampanile($arrayCategories, $id)]);
    }
}
