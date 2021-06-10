<?php


namespace App\Repositories;


use App\Models\PackageQuestionChoice;

class PackageQuestionChoiceRepository implements \App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        return PackageQuestionChoice::query()->simplePaginate();
    }

    /**
     * @inheritDoc
     */
    public function getByQuestionId(int $questionId)
    {
        return PackageQuestionChoice::query()->where('question_id',$questionId)->simplePaginate();
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
    public function storeBulk(array $data)
    {
        // TODO: Implement storeBulk() method.
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
