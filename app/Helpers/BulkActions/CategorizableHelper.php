<?php


namespace App\Helpers\BulkActions;


use App\Models\PackageAnswer;
use Illuminate\Support\Arr;

class CategorizableHelper
{
    public static function manage($data, $model): void
    {
        static::bulkUpdate($data, $model);
    }

    private static function bulkUpdate($data, $model): void
    {
        $dataIds = Arr::pluck($data, 'id');
        $dataModels = $model->categorizables()->find($dataIds);
        foreach ($dataModels as $key => $dataModel) {
            $dataModel->fill($data[$key])->save();
        }
    }
}
