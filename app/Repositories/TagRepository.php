<?php


namespace App\Repositories;


use App\Models\Tag;

class TagRepository implements \App\Interfaces\Repositories\TagRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return Tag::query()->simplePaginate();
    }

    public function show(int $Id)
    {
        return Tag::query()->findOrFail($Id);
    }

    public function store(array $data): Tag
    {
        $item = new Tag($data);
        $item->save();

        return $item;
    }

    public function update(int $Id, array $data)
    {
        $item = Tag::query()->findOrFail($Id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $Id)
    {
        $item = Tag::query()->findOrFail($Id);
        return $item->delete();
    }
}
