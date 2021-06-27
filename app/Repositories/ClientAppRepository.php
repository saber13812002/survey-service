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

    public function show(int $id)
    {
        return ClientApp::query()->findOrFail($id);
    }

    public function store(array $data): ClientApp
    {
        $item = new ClientApp($data);
        $item->save();

        return $item;
    }

    public function update(int $id, array $data)
    {
        $item = ClientApp::query()->findOrFail($id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $id)
    {
        $item = ClientApp::query()->findOrFail($id);
        return $item->delete();
    }
}
