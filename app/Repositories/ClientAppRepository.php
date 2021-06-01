<?php


namespace App\Repositories;


use App\Models\ClientApp;

class ClientAppRepository implements \App\Interfaces\Repositories\ClientAppRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return ClientApp::query()->simplePaginate();
    }

    public function show(int $Id)
    {
        return ClientApp::query()->findOrFail($Id);
    }

    public function store(array $data): ClientApp
    {
        $item = new ClientApp($data);
        $item->save();

        return $item;
    }

    public function update(int $Id, array $data)
    {
        $item = ClientApp::query()->findOrFail($Id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $Id)
    {
        $item = ClientApp::query()->findOrFail($Id);
        return $item->delete();
    }
}
