<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Systemset extends FormRequest
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
            'name' => 'required',
      
            'keywords'=>'required',
            'desc'=>'required',
            'copyright'=>'required',
            'record'=>'required',
        ];
  
   
    }

    public function messages(){
        return [
            "name.required"=>"请输入网站名称",

            "keywords.required"=>"请输入关键字",
            "desc.required"=>"请输入网站描述",
            "copyright.required"=>"请输入版权信息",
            "record.required"=>"请输入备案号",
            
        ];
        
    }
}
