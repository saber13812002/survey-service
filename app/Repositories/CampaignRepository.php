<?php


namespace App\Repositories;


use App\Models\Campaign;

class CampaignRepository implements \App\Interfaces\Repositories\CampaignRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return Campaign::query()->simplePaginate();
    }

    public function show(int $Id)
    {
        return Campaign::query()->findOrFail($Id);
    }

    public function store(array $data): Campaign
    {
        $item = new Campaign($data);
        $item->save();

        return $item;
    }

    public function update(int $Id, array $data)
    {
        $item = Campaign::query()->findOrFail($Id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $Id)
    {
        $item = Campaign::query()->findOrFail($Id);
        return $item->delete();
    }
}
