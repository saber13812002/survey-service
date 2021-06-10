<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerTypeResource;
use App\Models\AnswerType;

class AnswerTypeController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/answers/types",
     *  operationId="getListOfAnswerTypes",
     *  summary="get list of all Answer types : if empty you should run seeder",
     *  tags={"Answer Types"},
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
     * Display a listing of the answer type resource.
     *
     * @return AnswerTypeResource
     */
    public function index()
    {
        return new AnswerTypeResource(["data" => AnswerType::query()->get()]);
    }

}
