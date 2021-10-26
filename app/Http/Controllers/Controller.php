<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="1.0.1",
 *     title="Survey Service OpenApi3 Documentation",
 *     description="Behandam Survey Service Api documentation",
 *     @OA\Contact(
 *         email="admin@kermany.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 *
 * @OA\Server(
 *       url="http://localhost:8000",
 *      description="LocalHost API Server"
 * )
 *
 * @OA\Server(
 *      url="https://debug.behaminplus.ir/survey-service",
 *      description="Debug API Server"
 * )
 *
 * @OA\Server(
 *      url="https://develop.behaminplus.ir/survey-service",
 *      description="DEVELOP API Server"
 * )
 *
 * @OA\Server(
 *      url="https://behaminplus.ir/messaging-service",
 *      description="Stage API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     name="AccessToken",
 *     type="http",
 *     description="Use Custom access token",
 *     securityScheme="access-token",
 *     scheme="access-token",
 *)
 *
 * @OA\Tag(
 *     name="Messages",
 *     description="API Endpoints for creating survey by our another service"
 * )
 * )
 *
 * Display a listing of the resource.
 * @Request({
 *     summary: Title of the route,
 *     description: This is a longer description for the route which will be visible once the panel is expanded,
 *     tags: Package
 * })
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
