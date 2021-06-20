<?php


namespace App\Repositories;


use App\Helpers\BulkActions\PackageQuestionHelper;
use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use App\Models\Package;
use App\Models\PackageQuestion;
use \Illuminate\Contracts\Pagination\Paginator;

class PackageQuestionRepository implements PackageQuestionRepositoryInterface
{

    public function getByPackageId(int $packageId): Paginator
    {
        return PackageQuestion::query()->where('package_id', $packageId)->orderBy('order')->simplePaginate();
    }

    public function getReportByPackageId(int $packageId)
    {
        return PackageQuestion::query()
            ->where('package_id', $packageId)
            ->orderBy('order')
            ->get();
    }

    public function show(int $id)
    {
        return PackageQuestion::query()->findOrFail($id);
    }

    public function store(array $data, int $packageId): PackageQuestion
    {
        $data['package_id'] = $packageId;
        $item = new PackageQuestion($data);
        $item->save();

        return $item;
    }

    /**
     * @inheritDoc
     */
    public function updateBulk(array $data, int $packageId)
    {
        $packageItem = Package::query()->findOrFail($packageId);
        PackageQuestionHelper::manage($data, $packageItem);
        return $packageItem;
    }

    public function update(int $id, array $data)
    {
//        $data = $this->setRequestedData($data); // TODO: when want to update all questions by one request

        $item = PackageQuestion::query()->findOrFail($id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $id)
    {
        $item = PackageQuestion::query()->findOrFail($id);
        return $item->delete();
    }
}
