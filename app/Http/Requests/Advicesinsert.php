<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Advicesinsert extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'title.required' => '类型名称不能为空',
            'content.required' => '显示内容不能为空',

        ];
    }
}
