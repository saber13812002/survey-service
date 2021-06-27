<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\TagFilter;
use App\Http\Resources\TagResource;
use App\Interfaces\Repositories\TagRepositoryInterface;
use App\Models\Tag;
use Behamin\BResources\Resources\BasicResourceCollection;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
    * @OA\Get(
    *  path="/api/v1/tags",
    *  operationId="getListOfAllItems",
    *  summary="get list of all items",
    *  tags={"Tags"},
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
    public function index(TagFilter $filters)
    {
        list($items, $count) = app()->make(TagRepositoryInterface::class)
            ->index($filters);
        return response(new BasicResourceCollection(['data' => $items->get(), 'count' => $count]));
    }

    /**
    * @OA\Post(
    *  path="/api/v1/tags",
    *  operationId="postANewItem",
    *  summary="define a new item",
    *  tags={"Tags"},
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
    *   @OA\RequestBody(
    *       required=true,
    *       @OA\JsonContent(ref="#/components/schemas/TagStoreRequest")
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
    * @return TagResource
    * @throws \Illuminate\Contracts\Container\BindingResolutionException
    */
    public function store(Request $request): TagResource
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
    * @OA\Get(
    *  path="/api/v1/tags/{tagId}",
    *  operationId="getTagItemById",
    *  summary="get tag item by id",
    *  tags={"Tags"},
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
    *       description="ID of tag",
    *       name="tagId",
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
     * @return TagResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->show($id)]);
    }

    /**
    * @OA\Put(
    *  path="/api/v1/tags/{tagId}",
    *  operationId="updateTagItemById",
    *  summary="update Tag item by id",
    *  tags={"Tags"},
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
    *       description="ID of Tag",
    *       name="tagId",
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
    *       @OA\JsonContent(ref="#/components/schemas/TagStoreRequest")
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
     * @return TagResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): TagResource
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
    * @OA\Delete(
    *  path="/api/v1/tags/{tagId}",
    *  operationId="removeAnItemById",
    *  summary="remove and app by id",
    *  tags={"Tags"},
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
    *       description="ID of tag",
    *       name="tagId",
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
     * @return TagResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): TagResource
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->destroy($id)]);
    }
}
