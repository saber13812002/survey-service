<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="QuestionBulkStoreRequest",
 *      description="Question Store Request body data",
 *      type="object",
 *     example={
 *              "create": {
 *                  {
 *                      "title":"Question Example 1 ...",
 *                      "order": 1
 *                  },
 *                  {
 *                      "title":"Question Example 2 ...",
 *                      "order": 2
 *                  },
 *                  {
 *                      "title":"Question Example 3 ...",
 *                      "order": 3
 *                  }
 *              },
 *
 *              "update": {
 *                  {
 *                      "id":18,
 *                      "title":"Question EXAMPLE ...",
 *                      "is_active": 1,
 *                      "order": 1
 *                  },
 *                  {
 *                      "id":19,
 *                      "title":"Question EXAMPLE ...",
 *                      "is_active": 1,
 *                      "order": 2
 *                  },
 *                  {
 *                      "id":20,
 *                      "title":"Question EXAMPLE ...",
 *                      "is_active": 1,
 *                      "order": 3
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

class QuestionBulkStoreRequest extends BasicRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'create' => 'array',
            'create.*.title' => 'string',
        ];
    }
}
