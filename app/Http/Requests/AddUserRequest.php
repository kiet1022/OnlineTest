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
            'username'=>'required|min:6'
        ];
    }

    public function messages(){
        return [
            'username.required'=>'Bạn chưa nhập username',
            'username.min'=>'username phải có ít nhất 6 kí tự'  
        ];
    }
}
