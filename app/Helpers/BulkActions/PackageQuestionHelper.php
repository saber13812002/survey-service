<?php


namespace App\Helpers\BulkActions;


use App\Models\PackageQuestion;
use Illuminate\Support\Arr;

class PackageQuestionHelper
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
            $dataModels[$key] = new PackageQuestion($dataItem);
        }
        $model->questions()->saveMany($dataModels);
    }

    private static function bulkUpdate($data, $model): void
    {
        $data = Arr::get($data, 'update', []);
        $dataIds = Arr::pluck($data, 'id');
        $dataModels = $model->questions()->find($dataIds);
        foreach ($dataModels as $key => $dataModel) {
            $dataModel->fill($data[$key])->save();
        }
    }

    private static function bulkDelete($data, $model): void
    {
        $data = Arr::get($data, 'delete', []);
        if (!empty($data)) {
            $model->questions()->whereIn('id', $data)->delete();
        }
    }
}
