<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageTypeResource;
use App\Models\PackageType;

class PackageTypeController extends Controller
{
    /**
     * @OA\Get(
     *  path="/api/v1/packages/types",
     *  operationId="getListOfPackageTypes",
     *  summary="get list of all package types : if empty you should run seeder",
     *  tags={"Package Types"},
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
     * Display a listing of the package type resource.
     *
     * @return PackageTypeResource
     */
    public function index(): PackageTypeResource
    {
        return new PackageTypeResource(["data" => PackageType::query()->where('is_active', 1)->get()]);
    }

}
