<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin extends FormRequest
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
                    'name' => 'required|unique:admin',
                    'pass' => 'required|same:repass',
                    'top'=>'required',
                    'email'=>'required|unique:admin',
                    'phone'=>'required|unique:admin',
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'required',
                    'pass' => 'same:repass'
                ];
        }
        
    }

    public function messages(){
        return [
            "name.required"=>"请输入用户名",
            "pass.required"=>"请输入密码",
            "name.unique"=>"用户名已存在",
            "pass.same"=>"两次密码不一致",
            'top.required'=>'描述不能为空',
            "email.unique"=>"邮箱已存在",
            "email.required"=>"邮箱不能为空",
            "phone.unique"=>"手机号码已存在",
            "phone.required"=>"手机号码不能为空",


        ];
        
    }
}
