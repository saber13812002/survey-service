<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="ConnectTemplatesIntoPackageRequest",
 *      description="Connect Templates Into Package Request",
 *      type="object",
 *     example={
 *          "serviceable_type": "MEDYAR/TEMPLATE",
 *          "serviceable_id": 1024
 *     }
 * )
 */

class ConnectTemplatesIntoPackageRequest extends BasicRequest
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
