<?php

namespace App\Http\Resources;

use Behamin\BResources\Resources\BasicResource;

class PackageQuestionResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource)
    {
        return [
            'title' => $resource->id,
            "package_id" => $resource->package_id,
            "description" => $resource->description,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at
        ];
    }
}
