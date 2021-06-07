<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageAnswerResource;
use App\Http\Resources\PackageAnswerResourceCollection;
use App\Interfaces\Repositories\PackageAnswerRepositoryInterface;
use App\Models\PackageAnswer;
use Illuminate\Http\Request;

class PackageAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PackageAnswerResourceCollection
     */
    public function index(Request $request, int $package_id): PackageAnswerResourceCollection
    {
        return new PackageAnswerResourceCollection(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->index($request, $package_id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return PackageAnswerResource
     */
    public function store(Request $request)
    {
        $item = PackageAnswer::query()
            ->where('question_id', $request->question_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($item) {
            return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
                ->update($request->question_id, $request->all())]);
        }

        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->store($request->all())]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PackageAnswer $packageAnswer
     * @return PackageAnswerResource
     */
    public function show(int $packageAnswerId)
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->show($packageAnswerId)]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PackageAnswer $packageAnswer
     * @return PackageAnswerResource
     */
    public function showByquestionId(int $questionId)
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->showByQuestionId($questionId)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PackageAnswer $packageAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageAnswer $packageAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PackageAnswer $packageAnswer
     * @return PackageAnswerResource
     */
    public function update(Request $request, int $questionId)
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->update($questionId, $request->all())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $packageAnswerId
     * @return PackageAnswerResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(int $packageAnswerId): PackageAnswerResource
    {
        return new PackageAnswerResource(["data" => app()->make(PackageAnswerRepositoryInterface::class)
            ->destroy($packageAnswerId)]);
    }
}
