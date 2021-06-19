<?php

namespace App\Http\Resources;

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

            "packable_id" => $resource->packable_id,
            "packable_type" => $resource->packable_type,

            "title" => $resource->title,
            "description" => $resource->description,

            "first_text" => $resource->first_text,
            "final_text" => $resource->final_text,

            "started_at" => $resource->started_at,
            "finished_at" => $resource->finished_at,

            "is_active" => $resource->is_active,
            "is_deletable" => $resource->is_deletable,

            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,

            'tags' => $resource->tags,
            'categories' => $resource->categories,
            'campaigns' => $resource->campaigns,
        ];
    }
}
