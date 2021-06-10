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
     * @OA\Get(
     *  path="/api/v1/apps",
     *  operationId="getListOfApps",
     *  summary="get list of all apps",
     *  tags={"Apps"},
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
     * @OA\Post(
     *  path="/api/v1/apps",
     *  operationId="postANewApp",
     *  summary="define a new app",
     *  tags={"Apps"},
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
     *       @OA\JsonContent(ref="#/components/schemas/AppStoreRequest")
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
     * @param \Illuminate\Http\Request $request
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(Request $request)
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * @OA\Get(
     *  path="/api/v1/apps/{appId}",
     *  operationId="getAppItemById",
     *  summary="get app item by id",
     *  tags={"Apps"},
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
     *       description="ID of app",
     *       name="appId",
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
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/apps/{appId}",
     *  operationId="updateANewApp",
     *  summary="update a new app item",
     *  tags={"Apps"},
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
     *       description="ID of app",
     *       name="appId",
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
     *       @OA\JsonContent(ref="#/components/schemas/AppStoreRequest")
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
     * @OA\Delete(
     *  path="/api/v1/apps/{appId}",
     *  operationId="removeAnApp",
     *  summary="remove and app",
     *  tags={"Apps"},
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
     *       description="ID of app",
     *       name="appId",
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
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): ClientAppResource
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->destroy($id)]);
    }
}
