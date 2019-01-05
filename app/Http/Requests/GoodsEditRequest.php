<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsEditRequest extends FormRequest
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
            //
            'title' => 'required',
            'price' => 'required|regex:/\d+/',
            'cate_id' => 'required',
            'place_id' => 'required'
        ];
    }

    // 自定义错误
    public function messages(){
        return [
            'title.required' => '请填写商品标题',
            'price.required' => '请填写商品价格',
            'price.regex' => '请填写正确格式的商品价格',
            'cate_id.required' => '请添加商品标签',
            'place_id.required' => '请添加景点'
        ];
    }
}
