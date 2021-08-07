<?php

namespace App\Http\Resources;

use App\Http\Filters\PackageQuestionChoiceFilter;
use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
use Behamin\BResources\Resources\BasicResource;
use Illuminate\Http\Request;

class PackageQuestionResource extends BasicResource
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
        list($items, $count) = app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->getByQuestionId(new PackageQuestionChoiceFilter(new Request()), $resource->id);

        $choices = new PackageQuestionChoiceResourceCollection(["data" => $items->get(), "count" => $count], true);

        return [
            'id' => $resource->id,
            'title' => $resource->title,
            "package_id" => $resource->package_id,
            "description" => $resource->description,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
            'choices' => $choices,
        ];
    }
}
