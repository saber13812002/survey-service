<?php

namespace App\Http\Resources;

use Behamin\BResources\Resources\BasicResource;

class PackageParticipantResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    protected function getArray($resource): array
    {
        return [
            $resource->package
        ];
    }
}
