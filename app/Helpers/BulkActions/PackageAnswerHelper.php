<?php


namespace App\Helpers\BulkActions;


use App\Models\PackageAnswer;
use Illuminate\Support\Arr;

class PackageAnswerHelper
{
    public static function manage($data, $model): void
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

    private static function bulkCreate($data, $model): void
    {
        $data = Arr::get($data, 'create', []);
        $dataModels = [];
        foreach ($data as $key => $dataItem) {
            $dataModels[$key] = new PackageAnswer($dataItem);
        }
        $model->answers()->saveMany($dataModels);
    }

    private static function bulkUpdate($data, $model): void
    {
        $data = Arr::get($data, 'update', []);
        $dataIds = Arr::pluck($data, 'id');
        $dataModels = $model->answers()->find($dataIds);
        foreach ($dataModels as $key => $dataModel) {
            $dataModel->fill($data[$key])->save();
        }
    }

    private static function bulkDelete($data, $model): void
    {
        $data = Arr::get($data, 'delete', []);
        if (!empty($data)) {
            $model->answers()->whereIn('id', $data)->delete();
        }
    }
}
