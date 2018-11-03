<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostForumRequest extends FormRequest
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
            'title'=>'required|min:6',
            'id_subject'=>'required',
            'content'=>'required'
        ];
    }
    public function messages(){
        return [
            'title.required'=>'Bạn chưa nhập tiêu đề bài đăng',
            'title.min'=>'Tiêu đề bài đăng phải lớn hơn 6 kí tự',
            'id_subject.required'=>'bạn chưa chọn chủ đề của bài đăng',
            'content.required'=>'Bạn chưa nhập nội dung bài đăng'
        ];
    }
}
