<?php


namespace App\Repositories;


use App\Models\Categorizable;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements \App\Interfaces\Repositories\CategoryRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return Category::query()->simplePaginate();
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
