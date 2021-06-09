<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryResourceCollection;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\ClientAppRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CategoryResourceCollection
     */
    public function index()
    {
        return new CategoryResourceCollection(["data" => app()->make(CategoryRepositoryInterface::class)
            ->index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return CategoryResource
     */
    public function store(Request $request): CategoryResource
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return CategoryResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return CategoryResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): CategoryResource
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return CategoryResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id)
    {
        return new CategoryResource(["data" => app()->make(CategoryRepositoryInterface::class)
            ->destroy($id)]);
    }
}
