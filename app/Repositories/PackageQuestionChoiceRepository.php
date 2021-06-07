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
    public function getByQuestionId(int $question_id)
    {
        return PackageQuestionChoice::query()->where('question_id',$question_id)->simplePaginate();
    }

    /**
     * @inheritDoc
     */
    public function show(int $Id)
    {
        return PackageQuestionChoice::query()->findOrFail($Id);
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
    public function update(int $Id, array $data)
    {
        $item = PackageQuestionChoice::query()->findOrFail($Id);
        $item->fill($data);
        $item->save();
        return $item;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $Id)
    {
        $item = PackageQuestionChoice::query()->findOrFail($Id);
        return $item->delete();
    }
}
