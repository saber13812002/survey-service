<?php

namespace App\Http\Controllers;

use App\Models\Serviceable;
use Illuminate\Http\Request;

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
     *       @OA\JsonContent(ref="#/components/schemas/ConnectCampaignsIntoPackageRequest")
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
     * @param PackageConnectToCampaignRequest $request
     * @param int $id
     * @return CampanileResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function connect(PackageConnectToTemplateRequest $request, int $id): TemplateResource
    {
        if (!$request->has('campaigns.connect')) {
            throw new \Exception("failed to found campaigns connect");
        }

        $data = $request->only("serviceable_id", "serviceable_type");

        return new TemplateResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->attachTemplate($data, $id)]);
    }

    /**
     * @OA\Delete(
     *  path="/api/v1/packages/{packageId}/templates",
     *  operationId="disconnectTemplatesArrayIntoPackageById",
     *  summary="disconnect templates array into package by package id",
     *  tags={"Templates into Package"},
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
     *       @OA\JsonContent(ref="#/components/schemas/DisconnectTemplatesIntoPackageRequest")
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
    public function disconnect(Request $request, int $id): TemplatesResource
    {
        if (!$request->has('templates.disconnect')) {
            throw new \Exception("failed to found templates disconnect");
        }

        $data = $request->input("templates.disconnect");

        return new TemplatesResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->detachTemplates($data, $id)]);
    }
}
