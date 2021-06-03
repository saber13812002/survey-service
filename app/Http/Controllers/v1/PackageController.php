<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use Illuminate\Http\Request;

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
     *       name="access_token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2333nLZxxbWk92UcPQkwM8k",
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
     */
    public function index(): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->index()]);
    }

    /**
     * @OA\Post (
     *  path="/api/v1/packages",
     *  operationId="createNewPackage",
     *  summary="create new package",
     *  tags={"Packages"},
     *
     *  @OA\Parameter(
     *       name="access_token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2333nLZxxbWk92UcPQkwM8k",
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
     * Display the specified resource.
     *
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->show($id)]);
    }

    /**
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(Request $request, int $id): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->destroy($id, $request->all())]);
    }
}
