<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="ConnectTagsIntoPackageRequest",
 *      description="Connect Tags Into Package Request",
 *      type="object",
 *      required={"tags"},
 *     example={
 *     "tags": {
 *             "connect": {
 *                 12,
 *                 17
 *             }
 *         }
 *     }
 * )
 */

class ConnectTagsIntoPackageRequest extends BasicRequest
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
