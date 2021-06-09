<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Interfaces\Repositories\TagRepositoryInterface;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TagResource
     */
    public function index(): TagResource
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TagResource
     */
    public function store(Request $request): TagResource
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return TagResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(int $id)
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->show($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return TagResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): TagResource
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->update($id, $request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return TagResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $id): TagResource
    {
        return new TagResource(["data" => app()->make(TagRepositoryInterface::class)
            ->destroy($id)]);
    }
}
