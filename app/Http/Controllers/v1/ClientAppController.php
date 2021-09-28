<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\ClientAppFilter;
use App\Http\Resources\ClientAppResource;
use App\Interfaces\Repositories\ClientAppRepositoryInterface;
use Behamin\BResources\Resources\BasicResourceCollection;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(ClientAppFilter $filters)
    {
        list($items, $count) = app()->make(ClientAppRepositoryInterface::class)
            ->index($filters);
        return response(new BasicResourceCollection(['data' => $items->get(), 'count' => $count]));
    }

    /**
     * @OA\Post(
     *  path="/api/v1/apps",
     *  operationId="postANewApp",
     *  summary="define a new app",
     *  tags={"Apps"},
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
     * @param Request $request
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(Request $request): ClientAppResource
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
     *       name="appId",
     *       description="fake",
     *       required=true,
     *       in="header",
     *       example="0",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       name="app_id",
     *       description=" default 0 for env=prod,stage,.. and 1 for local",
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
            ->show()]);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/apps/{appId}",
     *  operationId="updateANewApp",
     *  summary="update a new app item",
     *  tags={"Apps"},
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
     *       name="appId",
     *       description="fake",
     *       required=true,
     *       in="header",
     *       example="0",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       name="app_id",
     *       description=" default 0 for env=prod,stage,.. and 1 for local",
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
     * @param Request $request
     * @param int $id
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): ClientAppResource
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->update($request->all())]);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/apps",
     *  operationId="removeAnApp",
     *  summary="remove an app by id",
     *  tags={"Apps"},
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
     *       name="app_id",
     *       description=" default 0 for env=prod,stage,.. and 1 for local",
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
     *
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return ClientAppResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(): ClientAppResource
    {
        return new ClientAppResource(["data" => app()->make(ClientAppRepositoryInterface::class)
            ->destroy()]);
    }
}
