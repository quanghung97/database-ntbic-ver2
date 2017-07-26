<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemDeTaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function response(array $errors){

        return \Redirect::back()->withErrors($errors)->withInput();
    }

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
            'ten_de_tai' => 'required', 'maso_kyhieu' => 'required','chu_nhiem_detai' => 'required','chuyen_nganh_khcn' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'ten_de_tai.required' => 'Chưa nhập tên cho đề tài!',
            'maso_kyhieu.required' => 'Chưa nhập Mã số - Ký hiệu!',
            'chu_nhiem_detai.required' => 'Chưa nhập tên của chủ nhiệm cho đề tài này!',
            'chuyen_nganh_khcn.required' => 'Chưa nhập số liệu cho chuyên ngành!',
        ];
    }
}
