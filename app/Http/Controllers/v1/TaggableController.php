<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageConnectToTagRequest;
use App\Http\Resources\TaggableResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use App\Models\Taggable;
use Illuminate\Http\Request;

class TaggableController extends Controller
{
    /**
     * @OA\Put(
     *  path="/api/v1/packages/{packageId}/tags",
     *  operationId="connectTagsArrayIntoPackageById",
     *  summary="connect tags array into package by package id",
     *  tags={"Tags into Package"},
     *
     *  @OA\Parameter(
     *       name="X-Proxy-Token",
     *       required=true,
     *       in="header",
     *       example="D6281688E663E19C9BD1FDECC2A2F",
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
     *  @OA\Parameter(
     *       description="app id",
     *       name="app_id",
     *       required=true,
     *       in="header",
     *       example="0",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/ConnectTagsIntoPackageRequest")
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
     * @param PackageConnectToTagRequest $request
     * @param int $id
     * @return TaggableResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function connect(PackageConnectToTagRequest $request, int $id): TaggableResource
    {
        if (!$request->has('tags.connect')) {
            throw new \Exception("failed to found tags connect");
        }

        $arrayCategories = $request->input("tags.connect");

        return new TaggableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->attachTaggable($arrayCategories, $id)]);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/packages/{packageId}/tags",
     *  operationId="disconnectTagsArrayIntoPackageById",
     *  summary="disconnect tags array into package by package id",
     *  tags={"Tags into Package"},
     *
     *  @OA\Parameter(
     *       name="X-Proxy-Token",
     *       required=true,
     *       in="header",
     *       example="D6281688E663E19C9BD1FDECC2A2F",
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
     *  @OA\Parameter(
     *       description="app id",
     *       name="app_id",
     *       required=true,
     *       in="header",
     *       example="0",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/DisconnectTagsIntoPackageRequest")
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
    public function disconnect(Request $request, int $id): TaggableResource
    {
        if (!$request->has('tags.disconnect')) {
            throw new \Exception("failed to found tags disconnect");
        }

        $arrayCategories = $request->input("tags.disconnect");

        return new TaggableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->detachTaggable($arrayCategories, $id)]);
    }
}
