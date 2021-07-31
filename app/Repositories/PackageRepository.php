<?php


namespace App\Repositories;


use App\Http\Filters\PackageFilter;
use App\Models\Package;
use App\Models\PackageAnswer;
use App\Models\PackageType;

class PackageRepository implements \App\Interfaces\Repositories\PackageRepositoryInterface
{

    public function index(PackageFilter $filters)
    {
        return Package::appId()->filter($filters);
    }

    public function participants(PackageFilter $filters, int $id)
    {
        return PackageAnswer
//            ::with('user')
        ::query()
            ->where('package_id', $id)
            ->select(['user_id'])
            ->filter($filters);
    }

    public function show(int $id)
    {
        return Package::with(
            [
                'campaigns',
                'categories',
                'tags'
            ]
        )->findOrFail($id);
    }

    public function store(array $data): Package
    {
        $data = $this->setRequestedData($data);

        $item = new Package($data);
        $item->save();

        return $item;
    }

    public function update(int $id, array $data)
    {
        $data = $this->setRequestedData($data);

        $item = Package::query()->findOrFail($id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $id)
    {
        $item = Package::query()->findOrFail($id);
        return $item->delete();
    }

    public function attachCategorizable(array $categoryIds, int $packageId)
    {
        $item = Package::query()->findOrFail($packageId);
        return $item->categories()->sync($categoryIds, false);
    }

    /**
     * @inheritDoc
     */
    public function detachCategorizable(array $categoryIds, int $packageId)
    {
        $item = Package::query()->findOrFail($packageId);
        return $item->categories()->detach($categoryIds, false);
    }

    /**
     * @inheritDoc
     */
    public function attachCampanile(array $campaignIds, int $packageId)
    {
        $item = Package::query()->findOrFail($packageId);
        return $item->campaigns()->sync($campaignIds, false);
    }

    /**
     * @inheritDoc
     */
    public function detachCampanile(array $campaignIds, int $packageId)
    {
        $item = Package::query()->findOrFail($packageId);
        return $item->campaigns()->detach($campaignIds, false);
    }

    /**
     * @inheritDoc
     */
    public function attachTaggable(array $tagIds, int $packageId)
    {
        $item = Package::query()->findOrFail($packageId);
        return $item->tags()->sync($tagIds, false);
    }

    /**
     * @inheritDoc
     */
    public function detachTaggable(array $tagIds, int $packageId)
    {
        $item = Package::query()->findOrFail($packageId);
        return $item->tags()->detach($tagIds, false);
    }

    /**
     * @param array $data
     * @return array
     */
    public function setRequestedData(array $data): array
    {
        $packageType = PackageType::query()->findOrFail($data['package_type_id']);
        $data['packable_id'] = $packageType['id'];
        $data['packable_type'] = $packageType['model_name'];
        return $data;
    }
}
