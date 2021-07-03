<?php

namespace App\Http\Resources;

use App\Interfaces\Repositories\PackageAnswerRepositoryInterface;
use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
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
            ->getByPackageIdAndQuestionId($resource->package_id, $resource->id);

        $choices = app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->getByQuestionId($resource->id);

        return [
            'id' => $resource->id,
            'title' => $resource->title,
            "description" => $resource->description,

            "answer_type_id" => $resource->answer_type_id,
            "correct_choice_id" => $resource->correct_choice_id,

            "order" => $resource->order,
            "weight" => $resource->weight,
            "is_active" => $resource->is_active,

            "source_id" => $resource->source_id,
            "event_ids" => $resource->event_ids,

            "package_id" => $resource->package_id,

            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,

            'choices_results' => $choicesStatistics,
            'choices' => $choices,
        ];
    }
}
