<?php

namespace App\Http\Resources;

use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use App\Models\PackageQuestion;
use Behamin\BResources\Resources\BasicResource;

class PackageQuestionChoiceResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource)
    {
        return [
            'id' => $resource->id,
            'title' => $resource->title,
            "description" => $resource->description,

            "question_id" => $resource->question_id,

            "order" => $resource->order,
            "weight" => $resource->weight,
            "is_active" => $resource->is_active,

            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at
        ];
    }
}
