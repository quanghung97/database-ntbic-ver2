<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormThemChuyenGiaRequest extends FormRequest
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
            'ten'=>'required',
            'nam_sinh'=>'required'
        ];
    }
    public function messages()
    {
      return [
        'ten.required' => 'Bắt buộc nhập tên chuyên gia',
        //'ten.alpha'  => 'Tên chỉ chứ các chữ cái',
        'nam_sinh.required'=>'Bắt buộc nhập ngày sinh',
        //'nam_sinh.date'=>'Dữ liệu ngày tháng dạng dd/mm/yy'
        ];
    } 
}
