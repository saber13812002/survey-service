<?php


namespace App\Repositories;


use App\Models\Package;

class PackageRepository implements \App\Interfaces\Repositories\PackageRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return Package::query()->simplePaginate();
    }

    public function show(int $Id)
    {
        return Package::query()->findOrFail($Id);
    }

    public function store(array $data): Package
    {
        $item = new Package($data);
        $item->save();

        return $item;
    }

    public function update(int $Id, array $data)
    {
        $item = Package::query()->findOrFail($Id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $Id)
    {
        $item = Package::query()->findOrFail($Id);
        return $item->delete();
    }

    public function attachCategorizable(array $category_ids, int $package_id)
    {
        $item = Package::query()->findOrFail($package_id);
        return $item->categories()->sync($category_ids, false);
    }

    /**
     * @inheritDoc
     */
    public function detachCategorizable(array $category_ids, int $package_id)
    {
        $item = Package::query()->findOrFail($package_id);
        return $item->categories()->detach($category_ids, false);
    }

    /**
     * @inheritDoc
     */
    public function attachCampanile(array $campaign_ids, int $package_id)
    {
        $item = Package::query()->findOrFail($package_id);
        return $item->campaigns()->sync($campaign_ids, false);
    }

    /**
     * @inheritDoc
     */
    public function detachCampanile(array $campaign_ids, int $package_id)
    {
        $item = Package::query()->findOrFail($package_id);
        return $item->campaigns()->detach($campaign_ids, false);
    }

    /**
     * @inheritDoc
     */
    public function attachTaggable(array $tag_ids, int $package_id)
    {
        $item = Package::query()->findOrFail($package_id);
        return $item->tags()->sync($tag_ids, false);
    }

    /**
     * @inheritDoc
     */
    public function detachTaggable(array $tag_ids, int $package_id)
    {
        $item = Package::query()->findOrFail($package_id);
        return $item->tags()->detach($tag_ids, false);
    }
}
