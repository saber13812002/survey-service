<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="TagStoreRequest",
 *      description="Tag Store Request body data",
 *      type="object",
 *      required={"title"},
 *     example={
 *           "title": "YOUR TITLE OF ..."
 *     }
 * )
 */

class TagStoreRequest extends BasicRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
