<?php


namespace App\Helpers\BulkActions;


use App\Models\PackageAnswer;
use Illuminate\Support\Arr;

class PackageAnswerUserHelper
{
    public static function manage($data, $model, $userId): void
    {
        if (Arr::has($data, 'update')) {
            static::bulkUpdate($data, $model, $userId);
        }
        if (Arr::has($data, 'delete')) {
            static::bulkDelete($data, $model, $userId);
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
            $dataItem['user_id'] = $userId;
            $dataItem['package_id'] = $model->id;
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
            $data[$key]['user_id'] = $userId;
            $data[$key]['package_id'] = $model->id;
            $dataModel->fill($data[$key])->save();
        }
    }

    private static function bulkDelete($data, $model, $userId): void
    {
        $data = Arr::get($data, 'delete', []);
        if (!empty($data)) {
            // TODO:check id of the user
            // TODO: check softdelete is better or not?
            foreach ($data as $id) {
                $model->answers()->where('id', $id)->where('user_id', $userId)->delete();
            }
        }
    }
}
