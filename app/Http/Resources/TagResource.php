<?php

namespace App\Http\Resources;

use Behamin\BResources\Resources\BasicResource;

class TagResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource)
    {
        return [
            //
        ];
    }
}
