<?php


namespace App\Repositories;


use App\Models\PackageQuestion;
use App\Models\PackageQuestionChoice;
use Illuminate\Support\Arr;

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
        return PackageQuestionChoice::query()->where('question_id', $questionId)->simplePaginate();
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
    public function storeBulk(array $data, int $questionId)
    {
        $packageQuestionItem = PackageQuestion::query()->findOrFail($questionId);
        self::manage($data, $packageQuestionItem);
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

    private static function manage($data, $model)
    {
        if (Arr::has($data, 'update')) {
            static::bulkUpdate($data, $model);
        }
        if (Arr::has($data, 'delete')) {
            static::bulkDelete($data, $model);
        }
        if (Arr::has($data, 'create')) {
            static::bulkCreate($data, $model);
        }
    }

    private static function bulkCreate($data, $model)
    {
        $data = Arr::get($data, 'create', []);
        $dataModels = [];
        foreach ($data as $key => $dataItem) {
            $dataModels[$key] = new PackageQuestionChoice($dataItem);
        }
        $model->choices()->saveMany($dataModels);
    }

    private static function bulkUpdate($data, $model)
    {
        $data = Arr::get($data, 'update', []);
        $dataIds = Arr::pluck($data, 'id');
        $dataModels = $model->choices()->find($dataIds);
        foreach ($dataModels as $key => $dataModel) {
            $dataModel->fill($data[$key])->save();
        }
    }

    private static function bulkDelete($data, $model)
    {
        $data = Arr::get($data, 'delete', []);
        if (!empty($data)) {
            $model->choices()->whereIn('id', $data)->delete();
        }
    }
}
