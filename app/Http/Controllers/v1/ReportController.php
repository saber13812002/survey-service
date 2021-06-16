<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageQuestionReportResourceCollection;
use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use App\Interfaces\Services\ReportServiceInterface;
use App\Models\PackageAnswer;
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
     *       example="161",
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
     *
     * @param int $packageId
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function byPackageId(int $packageId)
    {
        //get all users that answered to question related to this package id

        $package = app()->make(PackageRepositoryInterface::class)
            ->show($packageId);

        $packageQuestion = new PackageQuestionReportResourceCollection(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->getReportByPackageId($packageId)], true);

        $answerQuery = app()->make(ReportServiceInterface::class)
            ->getAllAnswerByPackageId($packageId);

        $query = DB::table('package_answers')
            ->where('package_id', $packageId);

        $report = $query->groupBy('user_id')
            ->select('user_id', DB::raw('count(*) as total_answers_for_this_user'));

        $total_count_member = $report->get();

        $created_at_max = PackageAnswer::query()
            ->where('package_id', $packageId)
            ->select('created_at')
            ->orderBy('created_at', 'desc')
            ->first()['created_at'];

        $created_at_min = PackageAnswer::query()
            ->where('package_id', $packageId)
            ->select('created_at')
            ->orderBy('created_at')
            ->first()['created_at'];

        $data['id'] = $package->id;
        $data['name'] = $package->title;
        $data['total_unique_answers'] = $answerQuery->count();
        $data['total_unique_users'] = $total_count_member->count();

        $data['avg_answer_per_user'] = $total_count_member->pluck('total_answers_for_this_user')->avg();
        $data['min_answer_per_user'] = $total_count_member->pluck('total_answers_for_this_user')->min();
        $data['max_answer_per_user'] = $total_count_member->pluck('total_answers_for_this_user')->max();

        $data['created_at_min'] = $created_at_min->toDateTimeString();
        $data['created_at_max'] = $created_at_max->toDateTimeString();

        $data['question'] = $packageQuestion;


        return response()->json($data);
    }
}
