<?php


namespace App\Repositories;


use App\Http\Filters\PackageAnswerFilter;
use App\Models\PackageAnswer;

class ParticipantRepository implements \App\Interfaces\Repositories\ParticipantRepositoryInterface
{
    public function packagesByParticipantId(PackageAnswerFilter $filters, int $id)
    {

        return PackageAnswer::with('package')
            ->where('user_id', $id)
            ->select(['package_id'])
            ->distinct()
            ->filter($filters);
    }
}
