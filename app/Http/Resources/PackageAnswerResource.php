<?php

namespace App\Http\Resources;

use App\Interfaces\Repositories\PackageQuestionRepositoryInterface;
use Behamin\BResources\Resources\BasicResource;

class PackageAnswerResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    public function getArray($resource): array
    {
            $question = app()->make(PackageQuestionRepositoryInterface::class)
                ->getQuestionItemWithChoicesById($resource->question_id);

        return [
            'id' => $resource->id,
            'title' => $resource->title,
            "description" => $resource->description,

            "question_id" => $resource->question_id,
            "choice_id" => $resource->choice_id,
            "app_id" => $resource->client_app_id,
            "package_id" => $resource->package_id,

            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,

            'question' => $question ?? []
        ];
    }
}
