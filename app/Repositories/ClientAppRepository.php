<?php


namespace App\Repositories;


use App\Models\ClientApp;

class ClientAppRepository implements \App\Interfaces\Repositories\ClientAppRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return ClientApp::query()->simplePaginate();
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
