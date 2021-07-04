<?php

namespace App\Http\Resources;

use App\Http\Filters\PackageQuestionChoiceFilter;
use App\Interfaces\Repositories\PackageAnswerRepositoryInterface;
use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
use Behamin\BResources\Resources\BasicResource;
use Illuminate\Http\Request;

class PackageQuestionReportResource extends BasicResource
{
    public function __construct($resource, $transform = false)
    {
        parent::__construct($resource, $transform);
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \JsonException
     */
    public function getArray($resource)
    {
        $choicesStatistics = app()->make(PackageAnswerRepositoryInterface::class)
            ->getByPackageIdAndQuestionId($resource->package_id, $resource->id);

        list($items, $count) = app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->getByQuestionId(new PackageQuestionChoiceFilter(new Request()), $resource->id);

        $choices = new PackageQuestionChoiceResourceCollection(["data" => $items->get(), 'count' => $count]);

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
