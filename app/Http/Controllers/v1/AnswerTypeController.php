<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\AnswerType;
use Behamin\BResources\Resources\BasicResourceCollection;
use BFilters\Filter;

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
     * Display a listing of the answer type resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Filter $filters)
    {
        list($items, $count) = AnswerType::filter($filters);
        return response(new BasicResourceCollection(['data' => $items->get(), 'count' => $count]));
    }

}
