<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="ChoiceBulkStoreRequest",
 *      description="Choices Store Request body data",
 *      type="object",
 *     example={
 *              "create": {
 *                  {
 *                      "title":"FOR EXAMPLE ...",
 *                      "order": 1
 *                  },
 *                  {
 *                      "title":"FOR EXAMPLE ...",
 *                      "order": 1
 *                  },
 *                  {
 *                      "title":"FOR EXAMPLE ...",
 *                      "order": 1
 *                  }
 *              },
 *
 *              "update": {
 *                  {
 *                      "id":18,
 *                      "title":"FOR EXAMPLE ...",
 *                      "is_active": 1,
 *                      "order": 1
 *                  },
 *                  {
 *                      "id":19,
 *                      "title":"FOR EXAMPLE ...",
 *                      "is_active": 1,
 *                      "order": 2
 *                  },
 *                  {
 *                      "id":20,
 *                      "title":"FOR EXAMPLE ...",
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

class ChoiceBulkStoreRequest extends BasicRequest
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
            'create' => 'array|required',
            'create.*.title' => 'string|required',
        ];
    }
}
