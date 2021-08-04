<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="AnswerStoreRequest",
 *      description="Answer Store Request body data",
 *      type="object",
 *      required={"package_id","question_id","user_id"},
 *     example={
 *           "title": "YOUR TITLE OF ...",
 *           "description": "YOUR TITLE OF ...",
 *           "package_id": 1,
 *           "question_id": 1,
 *           "user_id": 1,
 *           "choice_id": 2,
 *           "choice_ids": {1,2,3},
 *     }
 * )
 */
class AnswerStoreRequest extends BasicRequest
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
