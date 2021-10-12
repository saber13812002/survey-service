<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PackageAnswerFilter;
use App\Http\Resources\PackageParticipantResourceCollection;
use App\Interfaces\Repositories\ParticipantRepositoryInterface;

class ParticipantController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/participants/{participantId}/packages",
     *  operationId="getListOfAllPackageItemsByUserId",
     *  summary="get list of all package items by user id",
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
     *       description="ID of participant",
     *       name="participantId",
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
     * @param PackageAnswerFilter $filters
     * @param int $participantId
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function packagesByParticipantId(PackageAnswerFilter $filters, int $participantId): \Illuminate\Http\Response
    {
        list($items, $count) = app()
            ->make(ParticipantRepositoryInterface::class)
            ->packagesByParticipantId($filters, $participantId);

        $data = $items->get();

        return response(new PackageParticipantResourceCollection(['data' => $data, 'count' => $count], true));
    }

}
