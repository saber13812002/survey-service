<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="PackageConnectToCategoryRequest",
 *      description="Connect Campaigns Into Package Request",
 *      type="object",
 *      required={"campaigns"},
 *     example={
 *         {
 *              "id":"8",
 *              "order": 4
 *         },
 *         {
 *              "id":"9",
 *              "order": 1
 *         }
 *     }
 * )
 */

class PackageConnectToCategoryRequest extends BasicRequest
{
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
            'categories.connect' => 'array|required',
            'categories.connect.*' => 'required|exists:categories,id',
        ];
    }
}
