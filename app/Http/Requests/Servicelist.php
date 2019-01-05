<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Servicelist extends FormRequest
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
            'name' => 'required|unique:admin',
            'pass' => 'required|same:repass'
        ];
        
    }

    public function messages(){
        return [
            "name.required"=>"请输入用户名",
            "pass.required"=>"请输入密码",
            "name.unique"=>"用户名已存在",
            "pass.same"=>"两次密码不一致"

        ];
        
    }
}
