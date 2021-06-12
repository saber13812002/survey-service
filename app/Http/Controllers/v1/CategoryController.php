<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryResourceCollection;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\ClientAppRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/categories",
     *  operationId="getListOfCategories",
     *  summary="get list of all categories",
     *  tags={"Categories"},
     *
     *  @OA\Parameter(
     *       name="access_token",
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
     *
     * Display a listing of the categories resource.
     *
     * @return CategoryResourceCollection
     */
    public function index()
    {
        return new CategoryResourceCollection(["data" => app()->make(CategoryRepositoryInterface::class)
            ->index()]);
    }

    /**
     * @OA\Post(
     *  path="/api/v1/categories",
     *  operationId="postANewCategories",
     *  summary="define a new category",
     *  tags={"Categories"},
     *
     *  @OA\Parameter(
     *       name="access_token",
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
     *       @OA\JsonContent(ref="#/components/schemas/CategoryStoreRequest")
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
     * @return CategoryResource
     */
    public function store(Request $request): CategoryResource
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
    * @OA\Get(
    *  path="/api/v1/categories/{categoryId}",
    *  operationId="getCategoryItemById",
    *  summary="get category item by id",
    *  tags={"Categories"},
    *
    *  @OA\Parameter(
    *       name="access_token",
    *       required=true,
    *       in="header",
    *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
    *       @OA\Schema(
    *           type="string"
    *       )
    *   ),
    *
    *  @OA\Parameter(
    *       description="ID of category",
    *       name="categoryId",
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
    * @return CategoryResource
    * @throws \Illuminate\Contracts\Container\BindingResolutionException
    */
    public function show(int $id)
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/categories/{categoryId}",
     *  operationId="updateCategoryItemById",
     *  summary="update category item",
     *  tags={"Categories"},
     *
     *  @OA\Parameter(
     *       name="access_token",
     *       required=true,
     *       in="header",
     *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
     *       @OA\Schema(
     *           type="string"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       description="ID of category item",
     *       name="categoryId",
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
     *       @OA\JsonContent(ref="#/components/schemas/CategoryStoreRequest")
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
     * @return CategoryResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): CategoryResource
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
    * @OA\Delete(
    *  path="/api/v1/categories/{categoryId}",
    *  operationId="removeItemById",
    *  summary="remove item by id",
    *  tags={"Categories"},
    *
    *  @OA\Parameter(
    *       name="access_token",
    *       required=true,
    *       in="header",
    *       example="4fVB9SZidiBAADD2444nLZxxbWk92UcPQkwM8k",
    *       @OA\Schema(
    *           type="string"
    *       )
    *   ),
    *
    *  @OA\Parameter(
    *       description="ID of category item",
    *       name="categoryId",
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
     * @return CategoryResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): CategoryResource
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->destroy($id)]);
    }
}
