<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PackageQuestionFilter;
use App\Http\Requests\PackageQuestionRequest;
use App\Http\Requests\QuestionBulkStoreRequest;
use App\Http\Resources\PackageQuestionReportResource;
use App\Http\Resources\PackageQuestionResource;
use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;

class PackageQuestionController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/packages/{packageId}/questions",
     *  operationId="getListOfAllItemsByPackageId",
     *  summary="get list of all items by package id",
     *  tags={"Questions"},
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getByPackageId(PackageQuestionFilter $filters, int $packageId)
    {
        list($items, $count) = app()->make(PackageQuestionRepositoryInterface::class)
            ->getByPackageId($filters, $packageId);
        return response(new PackageQuestionReportResource(['data' => $items->get(), 'count' => $count]));
    }

    /**
     * @OA\Post(
     *  path="/api/v1/packages/{packageId}/questions",
     *  operationId="postANewItemByPackageId",
     *  summary="define a new item by package id",
     *  tags={"Questions"},
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
     *       @OA\JsonContent(ref="#/components/schemas/QuestionStoreRequest")
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
     * @param PackageQuestionRequest $request
     * @param int $packageId
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(PackageQuestionRequest $request, int $packageId): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->store($request->all(), $packageId)]);
    }

    /**
     * @OA\Post(
     *  path="/api/v1/packages/{packageId}/questions/bulk",
     *  operationId="postArrayOfQuestionsByPackageIdToUpdateDeleteOrCreate",
     *  summary="post all questions by package id for create update or delete",
     *  tags={"Questions"},
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
     *       description="ID of item",
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
     *       @OA\JsonContent(ref="#/components/schemas/QuestionBulkStoreRequest")
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
     * @param QuestionBulkStoreRequest $request
     * @param int $packageId
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function updateBulk(QuestionBulkStoreRequest $request, int $packageId): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->updateBulk($request->all(), $packageId)]);
    }

    /**
     * @OA\Get(
     *  path="/api/v1/questions/{questionId}",
     *  operationId="getItemById",
     *  summary="get question item by id",
     *  tags={"Questions"},
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
     *       description="ID of question",
     *       name="questionId",
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
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->show($id)], true);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/questions/{questionId}",
     *  operationId="updateQuestionItemById",
     *  summary="update Question item by id",
     *  tags={"Questions"},
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
     *       description="ID of Question",
     *       name="questionId",
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
     *       @OA\JsonContent(ref="#/components/schemas/QuestionStoreRequest")
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
     * @param PackageQuestionRequest $request
     * @param int $id
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(PackageQuestionRequest $request, int $id): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/questions/{questionId}",
     *  operationId="removeAnItemById",
     *  summary="remove and app by id",
     *  tags={"Questions"},
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
     *       description="ID of question",
     *       name="questionId",
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
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->destroy($id)]);
    }
}
