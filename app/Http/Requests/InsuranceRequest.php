<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceRequest extends FormRequest
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
            'name'=>'required',
            'type'=>'required',
            'money'=>'required|regex:/\d+/'
        ];
    }

    public function messages(){
        return [
            'name.required' => '保险名称不能为空',
            'type.required' => '请选择保险类型',
            'money.required' => '保险金额不能为空',
            'money.regex' => '保险金额只能输入数字'
        ];
    }
}
