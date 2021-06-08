<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageQuestionChoiceResource;
use App\Http\Resources\PackageQuestionChoiceResourceCollection;
use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
use Illuminate\Http\Request;

class PackageQuestionChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PackageQuestionChoiceResourceCollection
     */
    public function index(Request $request, int $packageQuestionId)
    {

        return new PackageQuestionChoiceResourceCollection(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->getByQuestionId($packageQuestionId)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PackageQuestionChoiceResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(Request $request, int $packageQuestionId): PackageQuestionChoiceResource
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->store($request->all(), $packageQuestionId)]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return PackageQuestionChoiceResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\PackageQuestionChoice $packageQuestionChoice
     * @return PackageQuestionChoiceResource
     */
    public function update(Request $request, int $packageQuestionChoice): PackageQuestionChoiceResource
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->update($packageQuestionChoice, $request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $packageQuestionChoice
     * @return PackageQuestionChoiceResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $packageQuestionChoice)
    {
        return new PackageQuestionChoiceResource(["data" => app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->destroy($packageQuestionChoice)]);
    }
}
