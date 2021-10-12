<?php


namespace App\Interfaces\Repositories;


use App\Http\Filters\CampaignFilter;

interface CampaignRepositoryInterface
{
    public function index(CampaignFilter $filters);

    public function show(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);

}
