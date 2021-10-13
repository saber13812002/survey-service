<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageCategoryUpdateRequest;
use App\Http\Requests\PackageConnectToCategoryRequest;
use App\Http\Resources\CategorizableResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use Exception;
use Illuminate\Http\Request;


class CategorizableController extends Controller
{
    /**
     * @OA\Put(
     *  path="/api/v1/packages/{packageId}/categories",
     *  operationId="connectCategoriesArrayIntoPackageById",
     *  summary="connect categories array into package by package id",
     *  tags={"Categories into Package"},
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
     *       @OA\JsonContent(ref="#/components/schemas/ConnectCategoriesIntoPackageRequest")
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
     * @param Request $request
     * @param int $id
     * @return CategorizableResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function connect(PackageConnectToCategoryRequest $request, int $id): CategorizableResource
    {
        if (!$request->has('categories.connect')) {
            throw new \Exception("failed to found categories connect");
        }

        $arrayCategories = $request->input("categories.connect");

        return new CategorizableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->attachCategorizable($arrayCategories, $id)]);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/packages/{packageId}/categories",
     *  operationId="disconnectCategoriesArrayIntoPackageById",
     *  summary="disconnect categories array into package by package id",
     *  tags={"Categories into Package"},
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
     *       @OA\JsonContent(ref="#/components/schemas/DisconnectCategoriesIntoPackageRequest")
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
     * @throws Exception
     */
    public function disconnect(Request $request, int $id): CategorizableResource
    {
        if (!$request->has('categories.disconnect')) {
            throw new \Exception("failed to found categories disconnect");
        }

        $arrayCategories = $request->input("categories.disconnect");

        return new CategorizableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->detachCategorizable($arrayCategories, $id)]);
    }

    /**
     * @OA\Patch (
     *  path="/api/v1/packages/{packageId}/categories",
     *  operationId="UpdatePackagesCategorizablesByPackageId",
     *  summary="update categorizable packages,
     *  tags={"Categories into Package"},
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
     *       @OA\JsonContent(ref="#/components/schemas/ConnectCategoriesIntoPackageRequest")
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
     * @param Request $request
     * @param int $id
     * @return CategorizableResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function update(PackageCategoryUpdateRequest $request, int $id): CategorizableResource
    {
        return new CategorizableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->updateCategorizable($request->all(), $id)]);
    }

}
