<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

class PackageRequest extends BasicRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
//            'client_app_id' => 'required',    //TODO: client app id is required or not
            'packable_id' => 'required',
            'packable_type' => 'required|string',
            'tags.connect' => 'nullable|exists_va:tags,id',
            'categories.connect' => 'nullable|exists_va:categories,id',
            'campaigns.connect' => 'nullable|exists_va:categories,id',

            'started_at' => [
                'nullable', 'date'
            ],
            'finished_at' => [
                'nullable', 'date', 'after_or_equal:started_at'
            ],
        ];
    }
}
