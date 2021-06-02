<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PackageResource
     */
    public function index(): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageRequest $request
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(PackageRequest $request): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return PackageResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(Request $request, int $id): PackageResource
    {
        return new PackageResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->destroy($id, $request->all())]);
    }
}
