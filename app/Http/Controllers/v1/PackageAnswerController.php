<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PackageAnswerFilter;
use App\Http\Requests\PackageAnswerBulkStoreRequest;
use App\Http\Requests\PackageAnswerBulkStoreUserRequest;
use App\Http\Resources\PackageAnswerResource;
use App\Http\Resources\PackageAnswerResourceCollection;
use App\Interfaces\Repositories\PackageAnswerRepositoryInterface;
use App\Models\PackageAnswer;
use Behamin\BResources\Resources\BasicResourceCollection;
use Illuminate\Http\Request;

class PackageAnswerController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/packages/{packageId}/answers",
     *  operationId="getListOfAllAnswerItemsForPackage",
     *  summary="get list of all asnwer items for this package group by users",
     *  tags={"Answers"},
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
     * @param Request $request
     * @param int $packageId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(PackageAnswerFilter $filters, int $packageId)
    {
        list($items, $count) = app()->make(PackageAnswerRepositoryInterface::class)
            ->index($filters, $packageId);
        return response(new BasicResourceCollection(['data' => $items->get(), 'count' => $count]));
    }


    /**
     * @OA\Get(
     *  path="/api/v1/packages/{packageId}/participants/{userId}",
     *  operationId="getListOfAllAnswerItemsForPackageForUser",
     *  summary="get list of all asnwer items for this package for specific user ",
     *  tags={"Reports"},
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
     *  @OA\Parameter(
     *       description="ID of package",
     *       name="packageId",
     *       required=true,
     *       in="path",
     *       example="161",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       description="ID of user",
     *       name="userId",
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
     * @param PackageAnswerFilter $filters
     * @param int $packageId
     * @param int $userId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response|void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function answersByPackageIdByUserId(PackageAnswerFilter $filters, int $packageId, int $userId)
    {
        list($items, $count) = app()->make(PackageAnswerRepositoryInterface::class)
            ->getByPackageIdAndUserId($filters, $packageId, $userId);

        $data = $items->get();

        return response(new PackageAnswerResourceCollection(['data' => $data, 'count' => $count], true));
    }

    /**
     * @OA\Post(
     *  path="/api/v1/questions/{questionId}/answers",
     *  operationId="postANewAnswerItemForThisQuestion",
     *  summary="define a new answer item for this Question by question id",
     *  tags={"Answers"},
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
     *       @OA\JsonContent(ref="#/components/schemas/AnswerStoreRequest")
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
     * @param int $questionId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(Request $request, int $questionId): PackageAnswerResource
    {
        $request->request->add(['question_id' => $questionId]);

        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * @OA\Get(
     *  path="/api/v1/answers/{answerId}",
     *  operationId="getAnswerItemById",
     *  summary="get answer item by id",
     *  tags={"Answers"},
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
     *       description="ID of answer",
     *       name="answerId",
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
     * @param int $answerId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $answerId): PackageAnswerResource
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->show($answerId)]);
    }

    /**
     * @OA\Get(
     *  path="/api/v1/questions/{questionId}/answers",
     *  operationId="getAnswerItemByQuestionId",
     *  summary="get answer items by question id",
     *  tags={"Answers"},
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
     * @param int $questionId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getByQuestionId(int $questionId): PackageAnswerResource
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->getByQuestionId($questionId)]);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/questions/{questionId}/answers",
     *  operationId="updateAnswerItemByQuestionId",
     *  summary="update Answer item by question id",
     *  tags={"Answers"},
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
     *       description="ID of question",
     *       name="questionId",
     *       required=true,
     *       in="path",
     *       example="61",
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
     *       @OA\JsonContent(ref="#/components/schemas/AnswerStoreRequest")
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
     * @param int $questionId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $questionId): PackageAnswerResource
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->update($questionId, $request->all())]);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/answers/{answerId}",
     *  operationId="removeAnItemById",
     *  summary="remove asnwer by id",
     *  tags={"Answers"},
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
     *       description="ID of answer",
     *       name="answerId",
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
     * @param int $answerId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $answerId): PackageAnswerResource
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->destroy($answerId)]);
    }


    /**
     * @OA\Post(
     *  path="/api/v1/packages/{packageId}/answers/bulk",
     *  operationId="postArrayOfAnswersByPackageIdToUpdateDeleteOrCreate",
     *  summary="post all answers by package id for create update or delete",
     *  tags={"Answers"},
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
     *       @OA\JsonContent(ref="#/components/schemas/PackageAnswerBulkStoreRequest")
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
     * @param PackageAnswerBulkStoreRequest $request
     * @param int $packageId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function storeUpdateBulk(PackageAnswerBulkStoreRequest $request, int $packageId): PackageAnswerResource
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->storeUpdateBulk($request->all(), $packageId)]);
    }


    /**
     * @OA\Post(
     *  path="/api/v1/users/{userId}/packages/{packageId}/answers/bulk",
     *  operationId="postArrayOfAnswersByPackageIdToUpdateDeleteOrCreateForUser",
     *  summary="post all answers by package id for create update or delete for specific user",
     *  tags={"Answers"},
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
     *       description="ID of user",
     *       name="userId",
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
     *       description="ID of package",
     *       name="packageId",
     *       required=true,
     *       in="path",
     *       example="161",
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
     *       @OA\JsonContent(ref="#/components/schemas/PackageAnswerBulkStoreUserRequest")
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
     * @param PackageAnswerBulkStoreUserRequest $request
     * @param int $userId
     * @param int $packageId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function userStoreUpdateBulk(PackageAnswerBulkStoreUserRequest $request, int $userId, int $packageId): PackageAnswerResource
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->userStoreUpdateBulk($request->all(), $userId, $packageId)]);
    }
}
