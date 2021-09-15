<?php


namespace App\Helpers\BulkActions;


use App\Models\PackageAnswer;
use Illuminate\Support\Arr;

class PackageAnswerUserHelper
{
    public static function manage($data, $model, $userId): void
    {
        if (Arr::has($data, 'update')) {
//            dd($userId);
            static::bulkUpdate($data, $model, $userId);
        }
        if (Arr::has($data, 'delete')) {
            static::bulkDelete($data, $model);
        }
        if (Arr::has($data, 'create')) {
            static::bulkCreate($data, $model, $userId);
        }
    }

    private static function bulkCreate($data, $model, $userId): void
    {
        $data = Arr::get($data, 'create', []);
        $dataModels = [];
        foreach ($data as $key => $dataItem) {
            $data['user_id'] = $userId;
            $dataModels[$key] = new PackageAnswer($dataItem);
        }
        $model->answers()->saveMany($dataModels);
    }

    private static function bulkUpdate($data, $model, $userId): void
    {
        $data = Arr::get($data, 'update', []);
        $dataIds = Arr::pluck($data, 'id');
        $dataModels = $model->answers()->find($dataIds);
        foreach ($dataModels as $key => $dataModel) {
            dd($data);
            $data['user_id'] = $userId;
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
