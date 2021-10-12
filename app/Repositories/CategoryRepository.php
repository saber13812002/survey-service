<?php


namespace App\Repositories;


use App\Http\Filters\CategoryFilter;
use App\Models\Category;

class CategoryRepository implements \App\Interfaces\Repositories\CategoryRepositoryInterface
{

    public function index(CategoryFilter $filters)
    {
        return Category::filter($filters);
    }

    public function show(int $id)
    {
        return Category::with('packages')->findOrFail($id);
    }

    public function store(array $data): Category
    {
        $item = new Category($data);
        $item->save();

        return $item;
    }

    public function update(int $id, array $data)
    {
        $item = Category::query()->findOrFail($id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $id)
    {
        $item = Category::query()->findOrFail($id);
        return $item->delete();
    }
}
