<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'email|unique:users,email',
            'password'=>'required|min:6',
            'repassword'=>'same:password'
        ];
    }

    public function messages(){
        return [
            'email'=>'Vui lòng nhập đúng định dạng email',
            'password.min'=>'password phải có ít nhất 6 ký tự',
            'unique'=>'Email đã tồn tại vui lòng nhập email khác',
            'repassword.same'=>'Mật khẩu chưa trùng khớp'
        ];
    }
}
