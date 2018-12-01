<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewQuestionRequest extends FormRequest
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
            'id_type'=>'required',
            'content' => 'required',
            'a'=>'required',
            'b'=>'required',
            'c'=>'required',
            'd'=>'required',
            'correct_answer'=>'required'
        ];
    }
    public function messages(){
        return [
            'id_type.required'=>'Bạn chưa chọn chủ đề câu hỏi',
            'content.required'=>'Bạn chưa nhập nội dung câu hỏi',
            'a.required'=>'Bạn chưa nhập đáp án A',
            'b.required'=>'Bạn chưa nhập đáp án B',
            'c.required'=>'Bạn chưa nhập đáp án C',
            'd.required'=>'Bạn chưa nhập đáp án D',
            'correct_answer.required'=>'Bạn chưa chọn đáp án đúng'
        ];
    }
}
