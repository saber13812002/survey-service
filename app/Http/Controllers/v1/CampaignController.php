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
    * @OA\Get(
    *  path="/api/v1/campaigns",
    *  operationId="getListOfCampaigns",
    *  summary="get list of all campaigns",
    *  tags={"Campaigns"},
    *
    *  @OA\Parameter(
    *       name="access_token",
    *       required=true,
    *       in="header",
    *       example="$tagIds4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
    *       @OA\Schema(
    *           type="string"
    *       )
    *   ),
    *
    *   @OA\Response(
    *      response=200,
    *       description="Success",
    *      @OA\MediaType(
    *           mediaType="application/json",
    *      )
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="not found"
    *   ),
    *)
     * Display a listing of the campaigns resource.
     *
     * @return CampaignResourceCollection
     */
    public function index(): CampaignResourceCollection
    {
        return new CampaignResourceCollection(["data" => app()->make(CampaignRepositoryInterface::class)
            ->index()]);
    }

    /**
    * @OA\Post(
    *  path="/api/v1/campaigns",
    *  operationId="postANewCampaign",
    *  summary="define a new campaign",
    *  tags={"Campaigns"},
    *
    *  @OA\Parameter(
    *       name="access_token",
    *       required=true,
    *       in="header",
    *       example="$tagIds4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
    *       @OA\Schema(
    *           type="string"
    *       )
    *   ),
    *
    *   @OA\RequestBody(
    *       required=true,
    *       @OA\JsonContent(ref="#/components/schemas/CampaignStoreRequest")
    *   ),
    *
    *   @OA\Response(
    *      response=200,
    *       description="Success",
    *      @OA\MediaType(
    *           mediaType="application/json",
    *      )
    *   ),
    *
    *   @OA\Response(
    *      response=404,
    *      description="not found"
    *   ),
    *)
    *
     * Store a newly created campaign resource in storage.
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
         * @OA\Get(
         *  path="/api/v1/campaigns/{campaignId}",
         *  operationId="getCampaignItemById",
         *  summary="get item by id",
         *  tags={"Campaigns"},
         *
         *  @OA\Parameter(
         *       name="access_token",
         *       required=true,
         *       in="header",
         *       example="$tagIds4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
         *       @OA\Schema(
         *           type="string"
         *       )
         *   ),
         *
         *  @OA\Parameter(
         *       description="ID of campaign",
         *       name="campaignId",
         *       required=true,
         *       in="path",
         *       example="1",
         *       @OA\Schema(
         *           type="integer",
         *           format="int64"
         *       )
         *   ),
         *
         *   @OA\Response(
         *      response=200,
         *       description="Success",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *)
         *
     * Display the specified campaign resource.
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
    * @OA\Put(
    *  path="/api/v1/campaigns/{campaignId}",
    *  operationId="updateCampaignItemById",
    *  summary="update campaign item by id",
    *  tags={"Campaigns"},
    *
    *  @OA\Parameter(
    *       name="access_token",
    *       required=true,
    *       in="header",
    *       example="$tagIds4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
    *       @OA\Schema(
    *           type="string"
    *       )
    *   ),
    *
    *  @OA\Parameter(
    *       description="ID of campaign",
    *       name="campaignId",
    *       required=true,
    *       in="path",
    *       example="1",
    *       @OA\Schema(
    *           type="integer",
    *           format="int64"
    *       )
    *   ),
    *
    *   @OA\RequestBody(
    *       required=true,
    *       @OA\JsonContent(ref="#/components/schemas/CampaignStoreRequest")
    *   ),
    *
    *   @OA\Response(
    *      response=200,
    *       description="Success",
    *      @OA\MediaType(
    *           mediaType="application/json",
    *      )
    *   ),
    *
    *   @OA\Response(
    *      response=404,
    *      description="not found"
    *   ),
    *)
    *
    *
    * Update the specified campaign resource in storage.
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
    * @OA\Delete(
    *  path="/api/v1/campaigns/{campaignId}",
    *  operationId="removeAnItemById",
    *  summary="remove item by id",
    *  tags={"Campaigns"},
    *
    *  @OA\Parameter(
    *       name="access_token",
    *       required=true,
    *       in="header",
    *       example="$tagIds4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
    *       @OA\Schema(
    *           type="string"
    *       )
    *   ),
    *
    *  @OA\Parameter(
    *       description="ID of campaign",
    *       name="campaignId",
    *       required=true,
    *       in="path",
    *       example="1",
    *       @OA\Schema(
    *           type="integer",
    *           format="int64"
    *       )
    *   ),
    *
    *   @OA\Response(
    *      response=200,
    *       description="Success",
    *      @OA\MediaType(
    *           mediaType="application/json",
    *      )
    *   ),
    *   @OA\Response(
    *      response=404,
    *      description="not found"
    *   ),
    *)
    *
    * Remove the specified campaign resource from storage.
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
