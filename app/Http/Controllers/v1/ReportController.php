<?php

namespace App\Http\Controllers\v1;

use App\Helpers\ReportHelper;
use App\Http\Controllers\Controller;
use App\Http\Filters\PackageFilter;
use App\Http\Resources\PackageQuestionReportResourceCollection;
use App\Http\Resources\ParticipantResourceCollection;
use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use App\Interfaces\Services\ReportServiceInterface;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    /**
     * @OA\Get(
     *  path="/api/v1/packages/{packageId}/reports",
     *  operationId="getReportByPackageId",
     *  summary="get reports by package id",
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
     * @param int $packageId
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function byPackageId(int $packageId): \Illuminate\Http\JsonResponse
    {
        //get all users that answered to question related to this package id

        $package = app()->make(PackageRepositoryInterface::class)
            ->show($packageId);

        $packageQuestion = new PackageQuestionReportResourceCollection(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->getItemsByPackageId($packageId)], true);

        $answerQuery = app()->make(ReportServiceInterface::class)
            ->getAllAnswerByPackageId($packageId);

        $query = DB::table('package_answers')
            ->where('package_id', $packageId);

        $report = $query->groupBy('user_id')
            ->select('user_id', DB::raw('count(*) as total_answers_for_this_user'));

        $total_count_member = $report->get();

        $created_at_max = ReportHelper::getPackageAnswerByCreatedAt($packageId, 'desc');

        $created_at_min = ReportHelper::getPackageAnswerByCreatedAt($packageId, 'asc');

        $data['id'] = $package->id;
        $data['name'] = $package->title;
        $data['package'] = $package;
        $data['total_unique_answers'] = $answerQuery->count();
        $data['total_unique_users'] = $total_count_member->count();

        $data['avg_answer_per_user'] = $total_count_member->pluck('total_answers_for_this_user')->avg();
        $data['min_answer_per_user'] = $total_count_member->pluck('total_answers_for_this_user')->min();
        $data['max_answer_per_user'] = $total_count_member->pluck('total_answers_for_this_user')->max();

        $data['created_at_min'] = $created_at_min ? $created_at_min->toDateTimeString() : null;
        $data['created_at_max'] = $created_at_max ? $created_at_max->toDateTimeString() : null;

        $data['question'] = $packageQuestion;


        return response()->json($data);
    }


    /**
     * @OA\Get(
     *  path="/api/v1/packages/{packageId}/participants",
     *  operationId="getParticipantsByPackageId",
     *  summary="get participants reports by package id",
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
     * @param PackageFilter $filters
     * @param int $packageId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function participantsByPackageId(PackageFilter $filters, int $packageId)
    {
        list($items, $count) = app()
            ->make(PackageRepositoryInterface::class)
            ->participants($filters, $packageId);

        $data = $items->get();

        return response(new ParticipantResourceCollection(['data' => $data], true));
    }

}
