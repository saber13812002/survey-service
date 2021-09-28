<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageConnectToTemplateRequest;
use App\Models\Serviceable;

class ServiceableController extends Controller
{
    /**
     * @OA\Put(
     *  path="/api/v1/packages/{packageId}/templates",
     *  operationId="connectTemplatesArrayIntoPackageById",
     *  summary="connect templates array into package by package id",
     *  tags={"Templates into Package"},
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
     *       @OA\JsonContent(ref="#/components/schemas/ConnectTemplatesIntoPackageRequest")
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
     * @param PackageConnectToTemplateRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(PackageConnectToTemplateRequest $request, int $id)
    {
        $service = new Serviceable();
        $service->package_id = $id;
        $service->fill($request->all());
        try {
            $service->save();
        } catch (\Exception $exception) {
            return response(array(
                "code"=> 409,
                "error"=>"duplicate: " . $exception->getMessage()));
        }
        return response($service);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/templates/{templateId}",
     *  operationId="disconnectTemplatesArrayIntoPackageById",
     *  summary="disconnect templates array into package by package id",
     *  tags={"Templates into Package"},
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
     *       description="templateId",
     *       name="templateId",
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
     *
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *)
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $item = Serviceable::query()->findOrFail($id);
        $item->delete();
        return response($item);
    }
}
