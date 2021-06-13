<?php


namespace App\Services;


use App\Models\PackageAnswer;

class ReportService implements \App\Interfaces\Services\ReportServiceInterface
{

    public function getAllAnswerByPackageId(int $packageId)
    {
        return PackageAnswer::query()->where('package_id', $packageId)->get();
    }
}
