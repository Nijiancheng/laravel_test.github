<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'email.required'  => '邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
        ];
    }
}
