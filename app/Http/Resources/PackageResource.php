<?php

namespace App\Http\Resources;

use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use Behamin\BResources\Resources\BasicResource;

class PackageResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource)
    {
        return [
            'id' => $resource->id,
            "client_app_id" => $resource->client_app_id,
            "parent_id" => $resource->parent_id,
            "title" => $resource->title,
            "description" => $resource->description,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
