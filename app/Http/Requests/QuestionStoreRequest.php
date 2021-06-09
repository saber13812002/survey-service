<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="QuestionStoreRequest",
 *      description="Question Store Request body data",
 *      type="object",
 *      required={"title", "package_id"},
 *     example={
 *           "title": "YOUR TITLE OF ..."
 *     }
 * )
 */
class QuestionStoreRequest extends BasicRequest
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
