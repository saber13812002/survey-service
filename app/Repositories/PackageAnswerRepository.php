<?php


namespace App\Repositories;


use App\Helpers\BulkActions\PackageAnswerHelper;
use App\Helpers\BulkActions\PackageAnswerUserHelper;
use App\Http\Filters\PackageAnswerFilter;
use App\Models\Package;
use App\Models\PackageAnswer;
use Illuminate\Support\Facades\DB;

class PackageAnswerRepository implements \App\Interfaces\Repositories\PackageAnswerRepositoryInterface
{

    public function index(PackageAnswerFilter $filters, int $packageId)
    {
        return PackageAnswer::query()
            ->where('package_id', $packageId)
            ->filter($filters);
    }

    public function show(int $id)
    {
        return PackageAnswer::query()->findOrFail($id);
    }

    public function getByQuestionId(int $questionId): \Illuminate\Contracts\Pagination\Paginator
    {
        return PackageAnswer::query()
            ->where('question_id', $questionId)
            ->simplePaginate();
    }

    public function store(array $data): PackageAnswer
    {
        $item = new PackageAnswer($data);
        $item->save();
        return $item;
    }

    public function update(int $questionId, array $data)
    {
        $item = PackageAnswer::query()->where('question_id', $questionId)->firstOrFail();
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function storeUpdateBulk(array $data, int $packageId)
    {
        $packageItem = Package::query()->findOrFail($packageId);
        PackageAnswerHelper::manage($data, $packageItem);
        return $packageItem->load('answers');
    }

    public function userStoreUpdateBulk(array $data, int $userId, int $packageId)
    {
        $packageItem = Package::query()->findOrFail($packageId);
        PackageAnswerUserHelper::manage($data, $packageItem, $userId);
        return $packageItem->load(['answers' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }]);
    }

    public function destroy(int $id)
    {
        $item = PackageAnswer::query()->findOrFail($id);
        return $item->delete();
    }


    public function getByPackageIdAndQuestionId(int $packageId, int $questionId)
    {
        return PackageAnswer::query()
            ->where('package_id', $packageId)
            ->where('question_id', $questionId)
            ->groupBy('choice_id')
            ->select('choice_id', DB::raw('count(*) as total'))
            ->get();
    }


    public function getByPackageIdAndUserId(PackageAnswerFilter $filters, int $packageId, int $userId)
    {
        return PackageAnswer::query()
            ->where('package_id', $packageId)
            ->where('user_id', $userId)
            ->select('id', 'question_id', 'choice_id')
            ->filter($filters);
    }
}
