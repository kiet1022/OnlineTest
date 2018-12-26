<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'required|min:6|email',
            'name'=>'required|min:6'
        ];
    }

    public function messages(){
        return [
            'email.required'=>'Bạn chưa nhập email',
            'email.min'=>'Email phải có ít nhất 6 kí tự',
            'email.email'=>'Vui lòng nhập đúng định dạng email',
            'name.required'=>"Bạn chưa nhập tên",
            'name.min'=>'Họ tên phải có ít nhất 6 kí tự'
        ];
    }
}
