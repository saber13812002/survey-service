<?php


namespace App\Repositories;


use App\Helpers\BulkActions\PackageQuestionChoiceHelper;
use App\Http\Filters\PackageQuestionChoiceFilter;
use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
use App\Models\PackageQuestion;
use App\Models\PackageQuestionChoice;

class PackageQuestionChoiceRepository implements PackageQuestionChoiceRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function index(PackageQuestionChoiceFilter $filters, int $questionId)
    {
        return PackageQuestionChoice::query()
            ->where('question_id', $questionId)
            ->orderBy('order')
            ->filter($filters);
    }


    /**
     * @inheritDoc
     */
    public function getByQuestionId(PackageQuestionChoiceFilter $filters, int $questionId)
    {
        return PackageQuestionChoice::query()
            ->where('question_id', $questionId)
            ->orderBy('order')
            ->filter($filters);
    }

    /**
     * @inheritDoc
     */
    public function show(int $id)
    {
        return PackageQuestionChoice::query()->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function store(array $data, int $packageQuestionId)
    {
        $data['question_id'] = $packageQuestionId;
        $item = new PackageQuestionChoice($data);
        $item->save();

        return $item;
    }

    /**
     * @inheritDoc
     */
    public function updateBulk(array $data, int $questionId)
    {
        $packageQuestionItem = PackageQuestion::query()->findOrFail($questionId);
        PackageQuestionChoiceHelper::manage($data, $packageQuestionItem);
        return $packageQuestionItem;
    }

// TODO: when want to update all questions by one request

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $item = PackageQuestionChoice::query()->findOrFail($id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id)
    {
        $item = PackageQuestionChoice::query()->findOrFail($id);
        return $item->delete();
    }

}
