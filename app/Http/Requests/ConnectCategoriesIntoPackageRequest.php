<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="ConnectCategoriesIntoPackageRequest",
 *      description="Connect Categories Into Package Request",
 *      type="object",
 *      required={"categories"},
 *     example={
 *     "categories": {
 *             "connect": {
 *                 12,
 *                 17
 *             }
 *         }
 *     }
 * )
 */

class ConnectCategoriesIntoPackageRequest extends BasicRequest
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
