<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategorizableResource;
use App\Interfaces\Repositories\PackageRepositoryInterface;
use http\Exception\BadHeaderException;
use Illuminate\Http\Request;
use Exception;


class CategorizableController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return CategorizableResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function connect(Request $request, int $id): CategorizableResource
    {
        if (!$request->has('categories.connect')) {
            throw new \Exception("failed to found categories connect");
        }

        $arrayCategories = $request->input("categories.connect");

        return new CategorizableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->attachCategorizable($arrayCategories, $id)]);
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws Exception
     */
    public function disconnect(Request $request, int $id): CategorizableResource
    {
        if (!$request->has('categories.disconnect')) {
            throw new \Exception("failed to found categories disconnect");
        }

        $arrayCategories = $request->input("categories.disconnect");

        return new CategorizableResource(["data" => app()->make(PackageRepositoryInterface::class)
            ->detachCategorizable($arrayCategories, $id)]);
    }
}
