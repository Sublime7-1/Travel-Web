<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Articleinsert extends FormRequest
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
                    'title' => 'required|max:20',
                    'cid' => 'required',
                    'gid' => 'required',
                    'source' => 'required|max:10',
                    'thumb' => 'required',
                    'content' => 'required'
                ];
                break;
            case 'PUT':
                return [
                    'title' => 'required|max:20',
                    'cid' => 'required',
                    'source' => 'required|max:10',
                    'content' => 'required'
                ];
        }
    }

    public function messages(){
        return [
            "title.required"=>"请输入文章标题",
            "title.max"=>"文章标题:请输入1-20个字",
            "cid.required"=>"请选择文章类型",
            "gid.required"=>"请选择商品类型",
            "source.required"=>"请输入文章来源",
            "source.max"=>"文章来源:请输入1-10个字",
            "thumb.required"=>"请选择文章缩略图",
            "content.required"=>"请输入文章内容"
        ];
    }
}
