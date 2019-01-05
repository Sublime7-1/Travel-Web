<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeUserInsect extends FormRequest
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
                    'telephone' => 'required|regex:/^1[3578]\w{9,9}$/',
                    'code' => 'required',
                    'yzm'=>'required',
                    
                ];
                
                
               
    
    }

     public function messages(){
         return [
            "telephone.required"=>"请输入手机号码",
            "telephone.regex"=>"手机号码格式不正确",
            "code.required"=>"请输入图片验证码",
            "yzm.required"=>"请输入手机校验码",


        ];   
    }
}
