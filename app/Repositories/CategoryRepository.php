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

    public function show(int $Id)
    {
        return Category::query()->findOrFail($Id);
    }

    public function store(array $data): Category
    {
        $item = new Category($data);
        $item->save();

        return $item;
    }

    public function update(int $Id, array $data)
    {
        $item = Category::query()->findOrFail($Id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $Id)
    {
        $item = Category::query()->findOrFail($Id);
        return $item->delete();
    }
}
