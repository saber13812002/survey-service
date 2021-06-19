<?php


namespace App\Repositories;


use App\Models\Tag;

class TagRepository implements \App\Interfaces\Repositories\TagRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return Tag::query()->simplePaginate();
    }

    public function show(int $id)
    {
        return Tag::with('packages')->findOrFail($id);
    }

    public function store(array $data): Tag
    {
        $item = new Tag($data);
        $item->save();

        return $item;
    }

    public function update(int $id, array $data)
    {
        $item = Tag::query()->findOrFail($id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $id)
    {
        $item = Tag::query()->findOrFail($id);
        return $item->delete();
    }
}
