<?php


namespace App\Repositories;


use App\Http\Filters\ClientAppFilter;
use App\Models\ClientApp;
use BFilters\Filter;

class ClientAppRepository implements \App\Interfaces\Repositories\ClientAppRepositoryInterface
{

    public function index(ClientAppFilter $filters)
    {
        return ClientApp::filter($filters);
    }

    public function show()
    {
        return ClientApp::appId()->firstOrFail();
    }

    public function store(array $data): ClientApp
    {
        $item = new ClientApp($data);
        $item->save();

        return $item;
    }

    public function update(array $data)
    {
        $item = ClientApp::query()->appId()->firstOrFail();
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy()
    {
        $item = ClientApp::query()->appId()->firstOrFail();
        return $item->delete();
    }
}
