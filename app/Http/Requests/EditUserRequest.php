<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'username' => 'required|min:4|max:15',
            'name' =>'required'
        ];
    }

    public function messages(){
        return [
            'username.required' => "Bạn chưa nhập username",
            'username.min' => "Username phải có tối thiểu 4 kí tự",
            'username.max' => "Username chỉ được tối đa 15 kí tự",
            'name.required'=>'Bạn chưa nhập họ tên'
        ];
    }
}
