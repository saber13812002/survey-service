<?php


namespace App\Helpers\BulkActions;


use App\Models\PackageQuestionChoice;
use Illuminate\Support\Arr;

class PackageQuestionChoiceHelper
{
    public static function manage($data, $model)
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
