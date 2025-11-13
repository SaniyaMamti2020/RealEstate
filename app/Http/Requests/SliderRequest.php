<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
        $imgReq = 'required|';
        if(isset($id) && $id != '' && !empty($id))
        {
            $imgReq = '';
        }
        return [
            'title' => 'required',
            'slider_img' => $imgReq."image|mimes:jpeg,png,jpg,gif|max:".config('constants.imageSize'),
            'btn_name' => '',
            'btn_link' => '',
        ];
    }
}
