<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewTestRequest extends FormRequest
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
            'title'=>'required',
            'numberofquestion'=>'required',
            'time'=>'required'
        ];
    }

    public function messages(){
        return [
            'title.required'=>'Bạn chưa nhập tiêu đề bài thi',
            'numberofquestion.required'=>"Bạn chưa nhập số lượng câu hỏi",
            'time.required'=>'Bạn chưa nhập thời gian làm bài'
        ];
    }
}
