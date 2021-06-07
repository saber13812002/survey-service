<?php

namespace App\Http\Resources;

use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use Behamin\BResources\Resources\BasicResource;

class PackageQuestionResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource)
    {

        $items = app()->make(PackageQuestionRepositoryInterface::class)
            ->getByPackageId($resource->id);

        $questions = new PackageQuestionResourceCollection(["data" => $items]);

        return [
            'id' => $resource->id,
            'title' => $resource->title,
            "package_id" => $resource->package_id,
            "description" => $resource->description,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at
        ];
    }
}
