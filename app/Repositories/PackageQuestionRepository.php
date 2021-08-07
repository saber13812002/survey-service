<?php


namespace App\Repositories;


use App\Helpers\BulkActions\PackageQuestionHelper;
use App\Http\Filters\PackageQuestionFilter;
use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use App\Models\Package;
use App\Models\PackageQuestion;

class PackageQuestionRepository implements PackageQuestionRepositoryInterface
{

    public function getByPackageId(PackageQuestionFilter $filters, int $packageId)
    {
        return PackageQuestion::query()
            ->where('package_id', $packageId)
            ->orderBy('order')
            ->filter($filters);
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

    public function getQuestionItemWithChoicesById(int $id)
    {
        return PackageQuestion::with("choices")->find($id);
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
