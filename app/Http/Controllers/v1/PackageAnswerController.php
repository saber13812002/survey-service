<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageAnswerResource;
use App\Http\Resources\PackageAnswerResourceCollection;
use App\Interfaces\Repositories\PackageAnswerRepositoryInterface;
use App\Models\PackageAnswer;
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
    * @return PackageAnswerResourceCollection
    * @throws \Illuminate\Contracts\Container\BindingResolutionException
    */
    public function index(Request $request, int $packageId): PackageAnswerResourceCollection
    {
        return new PackageAnswerResourceCollection(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->index($request, $packageId)]);
    }

    /**
    * @OA\Post(
    *  path="/api/v1/questions/{questionId}/answers",
    *  operationId="postANewAnswerItemForThisQuestion",
    *  summary="define a new answer item for this Question by question id",
    *  tags={"Answers"},
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
        $item = PackageAnswer::query()
            ->where('question_id', $questionId)
            ->where('user_id', $request->user_id)
            ->first();

        if ($item) {
            return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
                ->update($questionId, $request->all())]);
        }

        $request->request->add(['question_id' => $questionId]);

        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
         * @OA\Get(
         *  path="/api/v1/questions/answers/{answerId}",
         *  operationId="getAnswerItemById",
         *  summary="get answer item by id",
         *  tags={"Answers"},
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
    public function show(int $answerId)
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
     * @param int $questionId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getByQuestionId(int $questionId)
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
     * @param \App\Models\PackageAnswer $packageAnswer
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $questionId)
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->update($questionId, $request->all())]);
    }

    /**
    * @OA\Delete(
    *  path="/api/v1/answers/{answerId}",
    *  operationId="removeAnItemById",
    *  summary="remove and app by id",
    *  tags={"Answers"},
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
}
