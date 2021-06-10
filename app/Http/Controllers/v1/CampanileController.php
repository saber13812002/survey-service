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
     * @OA\Put(
     *  path="/api/v1/packages/{packageId}/campaigns",
     *  operationId="connectCampaignsArrayIntoPackageById",
     *  summary="connect campaigns array into package by package id",
     *  tags={"Campaigns into Package"},
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
     *       description="ID of package",
     *       name="packageId",
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
     *       @OA\JsonContent(ref="#/components/schemas/ConnectCampaignsIntoPackageRequest")
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
     * @OA\Delete(
     *  path="/api/v1/packages/{packageId}/campaigns",
     *  operationId="disconnectCampaignsArrayIntoPackageById",
     *  summary="disconnect campaigns array into package by package id",
     *  tags={"Campaigns into Package"},
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
     *       description="ID of package",
     *       name="packageId",
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
     *       @OA\JsonContent(ref="#/components/schemas/DisconnectCampaignsIntoPackageRequest")
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
