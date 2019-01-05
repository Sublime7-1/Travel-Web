<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Advert extends FormRequest
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
            'gid' => 'required',
            'sort' => 'required',
        ];   
    }

    public function messages(){
        return [
            "name.required"=>"请输入分类名",
            "gid.required"=>"请输入商品id",
            "sort.required"=>"请输入排序",
        ];
        
    }
}
