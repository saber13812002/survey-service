<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="ChoicesStoreRequest",
 *      description="Choices Store Request body data",
 *      type="object",
 *      required={"choices"},
 *     example={
 *              "create": {
 *                  {"title":"FOR EXAMPLE ..."},
 *                  {"title":"FOR EXAMPLE ..."},
 *                  {"title":"FOR EXAMPLE ..."}
 *              },
 *
 *              "update": {
 *                  {"id":18,"title":"FOR EXAMPLE ..."},
 *                  {"id":19,"title":"FOR EXAMPLE ..."},
 *                  {"id":20,"title":"FOR EXAMPLE ..."}
 *              },
 *
 *              "delete": {
 *                  13,
 *                  16
 *              }
 *     }
 * )
 */

class ChoicesStoreRequest extends BasicRequest
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
//            'choices' => 'array|required',
            'create' => 'array|required',
            'create.*.title' => 'string|required',
        ];
    }
}
