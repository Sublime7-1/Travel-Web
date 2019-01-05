<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountActiveRequest extends FormRequest
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
            'name' => 'required',
            'goods_id' => 'required',
            'discount_amount' => 'required|regex:/\d+/',
            'begin_time' => 'required',
            'end_time' => 'required',
            'content' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => '活动名称不能为空',
            'goods_id.required' => '请选择要添加的商品',
            'discount_amount.required' => '优惠金额不能为空', 
            'discount_amount.regex' => '优惠金额只能为数字', 
            'begin_time.required' => '活动开始时间不能为空',
            'end_time.required' => '活动结束时间不能为空',
            'content.required' => '活动详情不能为空'
        ];
    }


}
