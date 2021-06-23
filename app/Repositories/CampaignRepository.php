<?php


namespace App\Repositories;


use App\Http\Filters\CampaignFilter;
use App\Models\Campaign;

class CampaignRepository implements \App\Interfaces\Repositories\CampaignRepositoryInterface
{

    public function index(CampaignFilter $filters)
    {
        return Campaign::filter($filters);
    }

    public function show(int $id)
    {
        return Campaign::with('packages')->findOrFail($id);
    }

    public function store(array $data): Campaign
    {
        $item = new Campaign($data);
        $item->save();

        return $item;
    }

    public function update(int $id, array $data)
    {
        $item = Campaign::query()->findOrFail($id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $id)
    {
        $item = Campaign::query()->findOrFail($id);
        return $item->delete();
    }
}
