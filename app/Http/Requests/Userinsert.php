<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Userinsert extends FormRequest
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
                    'username' => 'required|unique:user',
                    'pass' => 'same:repass',
                    'tel'=>'required|unique:user|min:13|max:14',
                    'email'=>'required|unique:user',
                ];
                
                
               
    
    }

     public function messages(){
         return [
            "username.required"=>"请输入用户名",
            "pass.required"=>"请输入密码",
            "username.unique"=>"用户名已存在",
            "pass.same"=>"两次密码不一致",
            "tel.required"=>"请输入电话",
            "tel.unique"=>"电话号码已存在",
            "email.unique"=>"邮箱已存在",
            "email.required"=>"请输入邮箱",
            'tel.min'=>'电话号码格式不正确',
            'tel.max'=>'电话号码格式不正确',

        ];   
    }
}
