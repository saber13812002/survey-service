<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="DisconnectCampaignsIntoPackageRequest",
 *      description="Connect Campaigns Into Package Request",
 *      type="object",
 *      required={"campaigns"},
 *     example={
 *     "campaigns": {
 *             "disconnect": {
 *                 12,
 *                 17
 *             }
 *         }
 *     }
 * )
 */

class DisconnectCampaignsIntoPackageRequest extends BasicRequest
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
