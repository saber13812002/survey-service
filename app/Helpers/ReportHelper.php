<?php


namespace App\Helpers;


use App\Models\PackageAnswer;

class ReportHelper
{

    public static function getPackageAnswerByCreatedAt(int $packageId, string $orderType)
    {
        $item = PackageAnswer::query()
            ->where('package_id', $packageId)
            ->whereNotNull('created_at')
            ->select('created_at')
            ->orderBy('created_at', $orderType ?? 'desc')
            ->first();

        return $item ? $item['created_at'] : null;
    }
}
