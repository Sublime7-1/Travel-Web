<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Levelinsert extends FormRequest
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
            'userid' => 'required|unique:admin_level',
        ];
        
    }

    public function messages(){
        return [
            "userid.required"=>"请输入用户名",     
            "userid.unique"=>"用户名已存在",

        ];
        
    }
}
