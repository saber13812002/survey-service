<?php

namespace App\Http\Resources;

use App\Interfaces\Repositories\PackageQuestionChoiceRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function toArray($request): array
    {
        $choiceApp = app()->make(PackageQuestionChoiceRepositoryInterface::class)
            ->byQuestionId($this->id);

        $choices = ChoiceResource::collection($choiceApp);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'answer_type_id' => $this->answer_type_id,
            'order' => $this->order,
            'weight' => $this->weight,
            'is_active' => $this->is_active,

            "choices" => $choices
        ];
    }
}
