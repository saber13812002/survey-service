<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="PackageRequest",
 *      description="Package Request",
 *      type="object",
 *      required={"title"},
 *      example={
 *          "title": "نام پکیج",
 *          "package_type_id": 1,
 *          "parent_id": null,
 *          "description": "description",
 *          "first_text": "first_text",
 *          "final_text": "final_text",
 *          "started_at": "2021-06-02T14:48:37",
 *          "finished_at": "2021-06-02T14:48:37",
 *          "is_active": 1,
 *          "is_deletable": 1
 *      }
 * )
 */
class PackageRequest extends BasicRequest
{
    /**
     * @var mixed
     */
    private $package_type_id;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'package_type_id' => 'required|exists:package_types,id',
            'tags.connect' => 'nullable|exists_va:tags,id',
            'categories.connect' => 'nullable|exists_va:categories,id',
            'campaigns.connect' => 'nullable|exists_va:categories,id',
            'started_at' => [
                'nullable', 'date'
            ],
            'finished_at' => [
                'nullable', 'date', 'after_or_equal:started_at'
            ],
        ];
    }
}
