<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PackageAnswerFilter;
use App\Http\Resources\PackageParticipantResourceCollection;
use App\Interfaces\Repositories\ParticipantRepositoryInterface;

class ParticipantController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param PackageAnswerFilter $filters
     * @param int $participantId
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function packagesByParticipantId(PackageAnswerFilter $filters, int $participantId): \Illuminate\Http\Response
    {
        list($items, $count) = app()
            ->make(ParticipantRepositoryInterface::class)
            ->packagesByParticipantId($filters, $participantId);

        $data = $items->get();

        return response(new PackageParticipantResourceCollection(['data' => $data, 'count' => $count], true));
    }

}
