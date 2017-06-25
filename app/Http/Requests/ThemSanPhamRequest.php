<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemSanPhamRequest extends FormRequest
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
            'ten_san_pham' => 'required',
            'dac_diem_noi_bat' => 'required',
            'mo_ta_chung' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'ten_san_pham.required' => 'Yêu cầu nhập tên sản phẩm',
            'dac_diem_noi_bat.required'  => 'Yêu cầu nhập đặc điểm nổi bật',
            'mo_ta_chung.required' => 'Yêu cầu nhập mô tả chung'
        ];
    }
}
