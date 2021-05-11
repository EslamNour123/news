<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;



class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages(){
        return[

            'title.required' => __('messages.title_required'),
            'content.required' => __('messages.content_required'),
            //'image.required' => __('messages.image_required'),
            'category_id.required' => __('messages.category_id_required')

        ];
    }
}
