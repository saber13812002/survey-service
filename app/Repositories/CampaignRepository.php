<?php


namespace App\Repositories;


use App\Models\Campaign;

class CampaignRepository implements \App\Interfaces\Repositories\CampaignRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return Campaign::query()->simplePaginate();
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
