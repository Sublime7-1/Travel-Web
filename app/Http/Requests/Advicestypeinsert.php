<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Advicestypeinsert extends FormRequest
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
        switch ($this->method()){
            case 'POST':
                return [
                    'type' => 'required|min:2|unique:advicestype',
                    'content' => 'required|min:2',
                ];
                break;
            case 'PUT':
                return [
                    'type' => 'required|min:2',
                    'content' => 'required|min:2',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'type.required' => '类型名称不能为空',
            'type.unique' => '类型名称已存在',
            'type.min' => '名称输入字数必须大于2',
            'content.required' => '显示内容不能为空',
            'content.min' => '内容输入字数必须大于2',

        ];
    }
}
