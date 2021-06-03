<?php


namespace App\Repositories;


use App\Models\PackageQuestion;

class PackageQuestionRepository implements \App\Interfaces\Repositories\PackageQuestionRepositoryInterface
{

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return PackageQuestion::query()->simplePaginate();
    }

    public function getByPackageId(int $package_id): \Illuminate\Contracts\Pagination\Paginator
    {
        return PackageQuestion::query()->where('package_id',$package_id)->simplePaginate();
    }

    public function show(int $Id)
    {
        return PackageQuestion::query()->findOrFail($Id);
    }

    public function store(array $data): PackageQuestion
    {
        $item = new PackageQuestion($data);
        $item->save();

        return $item;
    }

    /**
     * @inheritDoc
     */
    public function storeBulk(array $data)
    {
        // TODO: Implement storeBulk() method.
    }

    public function update(int $Id, array $data)
    {
//        $data = $this->setRequestedData($data); // TODO: when want to update all questions by one request

        $item = PackageQuestion::query()->findOrFail($Id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $Id)
    {
        $item = PackageQuestion::query()->findOrFail($Id);
        return $item->delete();
    }
}
