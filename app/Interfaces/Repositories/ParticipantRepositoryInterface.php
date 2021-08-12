<?php


namespace App\Interfaces\Repositories;


use App\Http\Filters\PackageAnswerFilter;

interface ParticipantRepositoryInterface
{
    public function packagesByParticipantId(PackageAnswerFilter $filters, int $id);
}
