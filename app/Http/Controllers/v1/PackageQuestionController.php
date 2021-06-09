<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageQuestionRequest;
use App\Http\Resources\PackageQuestionResource;
use App\Http\Resources\PackageQuestionResourceCollection;
use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use Behamin\BResources\Traits\CollectionResource;
use Illuminate\Http\Request;

class PackageQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PackageQuestionResource
     */
    public function index(Request $request)
    {
        if ($request->has('package_id')) {

            return new PackageQuestionResourceCollection(["data" => app()->make(PackageQuestionRepositoryInterface::class)
                ->getByPackageId($request->package_id)]);
        }

        return new PackageQuestionResourceCollection(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageQuestionRequest $request
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(PackageQuestionRequest $request): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->show($id)],true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PackageQuestionRequest $request
     * @param int $id
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(PackageQuestionRequest $request, int $id): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return PackageQuestionResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): PackageQuestionResource
    {
        return new PackageQuestionResource(["data" => app()->make(PackageQuestionRepositoryInterface::class)
            ->destroy($id)]);
    }
}
