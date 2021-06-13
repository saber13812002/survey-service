<?php

namespace App\Http\Resources;

use App\Interfaces\Repositories\PackageAnswerRepositoryInterface;
use Behamin\BResources\Resources\BasicResource;

class PackageQuestionReportResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource)
    {
        $choicesStatistics = app()->make(PackageAnswerRepositoryInterface::class)
            ->getbyPackageIdAndQuestionId($resource->package_id, $resource->id);

        return [
            'id' => $resource->id,
            'title' => $resource->title,
            "package_id" => $resource->package_id,
            "description" => $resource->description,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
            'choices' => $choicesStatistics,
        ];
    }
}
