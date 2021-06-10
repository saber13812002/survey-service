<?php

namespace App\Http\Resources;

use Behamin\BResources\Resources\BasicResourceCollection;

class PackageResourceCollection extends BasicResourceCollection
{
    public function __construct($resourceCollection)
    {
        parent::__construct($resourceCollection, true);
    }

    protected function getArray($resource): array
    {
        return [
            'id' => $resource->id,
            'title' => $resource->title,
            'description' => $resource->description,
        ];
    }
}
