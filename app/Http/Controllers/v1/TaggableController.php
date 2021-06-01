<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaggableResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use App\Models\Taggable;
use Illuminate\Http\Request;

class TaggableController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return TaggableResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function connect(Request $request, int $id): TaggableResource
    {
        if (!$request->has('tags.connect')) {
            throw new \Exception("failed to found tags connect");
        }

        $arrayCategories = $request->input("tags.connect");

        return new TaggableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->attachTaggable($arrayCategories, $id)]);
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function disconnect(Request $request, int $id): TaggableResource
    {
        if (!$request->has('tags.disconnect')) {
            throw new \Exception("failed to found tags disconnect");
        }

        $arrayCategories = $request->input("tags.disconnect");

        return new TaggableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->detachTaggable($arrayCategories, $id)]);
    }
}
