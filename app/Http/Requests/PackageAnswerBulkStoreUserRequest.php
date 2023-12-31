<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="PackageAnswerBulkStoreUserRequest",
 *      description="Answer Store Update Request body data",
 *      type="object",
 *     example={
 *              "create": {
 *                  {
 *                      "title": "Question Example 1 ...",
 *                      "description": "asdfa22",
 *                      "question_id": 10,
 *                      "choice_id": 10
 *                  },
 *                  {
 *                      "title":"Question Example 2 ...",
 *                      "description": "asdfa22",
 *                      "question_id": 10,
 *                      "choice_id": 10
 *                  },
 *                  {
 *                      "title":"Question Example 3 ...",
 *                      "description": "asdfa22",
 *                      "question_id": 10,
 *                      "choice_id": 10
 *                  }
 *              },
 *
 *              "update": {
 *                  {
 *                      "id":18,
 *                      "title":"Question EXAMPLE ...",
 *                      "description": "asdfa22",
 *                      "question_id": 10,
 *                      "choice_id": 10
 *                  },
 *                  {
 *                      "id":19,
 *                      "title":"Question EXAMPLE ...",
 *                      "description": "asdfa22",
 *                      "question_id": 10,
 *                      "choice_id": 10
 *                  },
 *                  {
 *                      "id":20,
 *                      "title":"Question EXAMPLE ...",
 *                      "description": "asdfa22",
 *                      "question_id": 10,
 *                      "choice_id": 10
 *                  }
 *              },
 *
 *              "delete": {
 *                  13,
 *                  16
 *              }
 *     }
 * )
 */

class PackageAnswerBulkStoreUserRequest extends BasicRequest
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
            'create' => 'array',
            'create.*.question_id' => 'numeric',
            'create.*.package_id' => 'numeric',
            'create.*.choice_id' => 'numeric',

            'update' => 'array',
            'update.*.id' => 'numeric',
            'update.*.question_id' => 'numeric',
            'update.*.package_id' => 'numeric',
            'update.*.choice_id' => 'numeric',
        ];
    }
}
