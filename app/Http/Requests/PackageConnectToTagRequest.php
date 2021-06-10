<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

class PackageConnectToTagRequest extends BasicRequest
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
            'tags.connect' => 'array|required',
            'tags.connect.*' => 'required|exists:tags,id',
        ];
    }
}
