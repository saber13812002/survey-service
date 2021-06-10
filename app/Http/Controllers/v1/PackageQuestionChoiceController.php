<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageQuestionChoiceResource;
use App\Http\Resources\PackageQuestionChoiceResourceCollection;
use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
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
     * @return PackageQuestionChoiceResourceCollection
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(Request $request, int $packageQuestionId)
    {
        return new PackageQuestionChoiceResourceCollection(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->getByQuestionId($packageQuestionId)]);
    }

    /**
    * @OA\Post(
    *  path="/api/v1/questions/{questionId}/choices",
    *  operationId="postANewItem",
    *  summary="define a new choice item for specific question ",
    *  tags={"Choices"},
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
    * @OA\Get(
    *  path="/api/v1/questions/choices/{choiceId}",
    *  operationId="getChoiceItemById",
    *  summary="get choice item by choice id",
    *  tags={"Choices"},
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
    * Display the specified resource.
    *
    * @param int $id
    * @return PackageQuestionChoiceResource
    * @throws \Illuminate\Contracts\Container\BindingResolutionException
    */
    public function show(int $id)
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * @OA\Put(
     *  path="/api/v1/questions/choices/{choiceId}",
     *  operationId="updatechoiceItemById",
     *  summary="update choice item by id",
     *  tags={"Choices"},
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
    *  path="/api/v1/questions/choices/{choiceId}",
    *  operationId="removeAnItemById",
    *  summary="remove and app by id",
    *  tags={"Choices"},
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
