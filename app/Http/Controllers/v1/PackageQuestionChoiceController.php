<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PackageQuestionChoiceFilter;
use App\Http\Requests\ChoiceBulkStoreRequest;
use App\Http\Resources\PackageQuestionChoiceResource;
use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
use Behamin\BResources\Resources\BasicResourceCollection;
use Illuminate\Http\Request;

class PackageQuestionChoiceController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/questions/{questionId}/choices",
     *  operationId="getListOfAllItems",
     *  summary="get list of all items",
     *  tags={"Choices"},
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
     * @param PackageQuestionChoiceFilter $filters
     * @param int $packageQuestionId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(PackageQuestionChoiceFilter $filters, int $packageQuestionId)
    {        list($items, $count) = app()->make(PackageQuestionChoiceRepositoryInterface::class)
        ->index($filters, $packageQuestionId);
        return response(new BasicResourceCollection(['data' => $items->get(), 'count' => $count]));

    }

    /**
     * @OA\Post(
     *  path="/api/v1/questions/{questionId}/choices",
     *  operationId="postANewItem",
     *  summary="define a new choice item for specific question ",
     *  tags={"Choices"},
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
     *       @OA\JsonContent(ref="#/components/schemas/ChoiceStoreRequest")
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
     * @param int $packageQuestionId
     * @return PackageQuestionChoiceResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(Request $request, int $packageQuestionId): PackageQuestionChoiceResource
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->store($request->all(), $packageQuestionId)]);
    }

    /**
     * @OA\Post(
     *  path="/api/v1/questions/{questionId}/choices/bulk",
     *  operationId="postArrayOfChoicesByQuestionIdToUpdateDeleteCreate",
     *  summary="post all choices by question id for create update delete",
     *  tags={"Choices"},
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
     *       @OA\JsonContent(ref="#/components/schemas/ChoiceBulkStoreRequest")
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
     * @param ChoiceBulkStoreRequest $request
     * @param int $questionId
     * @return PackageQuestionChoiceResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function updateBulk(ChoiceBulkStoreRequest $request, int $questionId): PackageQuestionChoiceResource
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->updateBulk($request->all(), $questionId)]);
    }

    /**
    * @OA\Get(
    *  path="/api/v1/choices/{choiceId}",
    *  operationId="getChoiceItemById",
    *  summary="get choice item by choice id",
    *  tags={"Choices"},
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
    *       description="ID of choice",
    *       name="choiceId",
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
    * @return PackageQuestionChoiceResource
    * @throws \Illuminate\Contracts\Container\BindingResolutionException
    */
    public function show(int $id): PackageQuestionChoiceResource
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/choices/{choiceId}",
     *  operationId="updatechoiceItemById",
     *  summary="update choice item by id",
     *  tags={"Choices"},
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
     *       description="ID of choice",
     *       name="choiceId",
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
     *       @OA\JsonContent(ref="#/components/schemas/ChoiceStoreRequest")
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
     * @param int $packageQuestionChoice
     * @return PackageQuestionChoiceResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $packageQuestionChoice): PackageQuestionChoiceResource
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->update($packageQuestionChoice, $request->all())]);
    }

    /**
    * @OA\Delete(
    *  path="/api/v1/choices/{choiceId}",
    *  operationId="removeAnItemById",
    *  summary="remove choice by id",
    *  tags={"Choices"},
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
    *       description="ID of choice",
    *       name="choiceId",
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
    * @param int $packageQuestionChoice
    * @return PackageQuestionChoiceResource
    * @throws \Illuminate\Contracts\Container\BindingResolutionException
    */
    public function destroy(int $packageQuestionChoice): PackageQuestionChoiceResource
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->destroy($packageQuestionChoice)]);
    }
}
