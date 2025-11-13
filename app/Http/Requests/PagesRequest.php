<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PagesRequest extends FormRequest
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
        $id  = $this->get('id');

        return [
            'page_name' => 'required',
            'page_img' => "image|mimes:jpeg,png,jpg,gif|max:".config('constants.imageSize'),
            'page_desc' => '',
            'page_meta_tag' => '',
            'page_meta_title' => '',
            'page_meta_desc' => '',
        ];
    }
}
