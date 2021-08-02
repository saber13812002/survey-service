<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PackageFilter;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use Behamin\BResources\Resources\BasicResourceCollection;

class PackageController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/packages",
     *  operationId="getListOfPackages",
     *  summary="get list of all packages",
     *  tags={"Packages"},
     *
     *  @OA\Parameter(
     *       name="X-Proxy-Token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
     *       @OA\Schema(
     *           type="string"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       description="ID of app",
     *       name="appId",
     *       required=true,
     *       in="header",
     *       example="0",
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
     */
    public function index(PackageFilter $filters)
    {
        list($items, $count) = app()->make(PackageRepositoryInterface::class)
            ->index($filters);
        return response(new BasicResourceCollection(['data' => $items->get(), 'count' => $count]));
    }

    /**
     * @OA\Post (
     *  path="/api/v1/packages",
     *  operationId="createNewPackage",
     *  summary="create new package",
     *  tags={"Packages"},
     *
     *  @OA\Parameter(
     *       name="X-Proxy-Token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
     *       @OA\Schema(
     *           type="string"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       name="Content-Type",
     *       required=true,
     *       in="header",
     *       example="application/json",
     *       @OA\Schema(
     *           type="string"
     *       )
     *   ),
     *
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/PackageRequest")
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
     * Store a newly created resource in storage.
     *
     * @param PackageRequest $request
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(PackageRequest $request): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * @OA\Get(
     *  path="/api/v1/packages/{packageId}",
     *  operationId="getPackageItemById",
     *  summary="get package item by id",
     *  tags={"Packages"},
     *
     *  @OA\Parameter(
     *       name="X-Proxy-Token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
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
     * Display the specified resource.
     *
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->show($id)], true);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/packages/{packageId}",
     *  operationId="updatepackageItemById",
     *  summary="update package item by id",
     *  tags={"Packages"},
     *
     *  @OA\Parameter(
     *       name="X-Proxy-Token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
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
     *       @OA\JsonContent(ref="#/components/schemas/PackageRequest")
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
     * @param PackageRequest $request
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(PackageRequest $request, int $id): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/packages/{packageId}",
     *  operationId="removeAnItemById",
     *  summary="remove and app by id",
     *  tags={"Packages"},
     *
     *  @OA\Parameter(
     *       name="X-Proxy-Token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->destroy($id)]);
    }
}
