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
            'ten'=>'required|max:50',
            'nam_sinh'=>'required',
            'hoc_vi'=>'required',
            'tinh_thanh_pho'=>'required',
            'chuyen_nganh'=>'required',
            'file-anh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
      return [
        'ten.required' => 'Chưa nhập tên chuyên gia',
        'ten.max'=>'Tên quá dài (<50 kí tự)',
        'nam_sinh.required'=>'Chưa nhập ngày sinh',
        'chuyen_nganh.required'=>'Chưa nhập chuyên ngành',
        'file-anh.image'=>'Vui lòng chọn file có định dạng là ảnh',
        'file-anh.mimes'=>'Vui lòng chọn file có định dạng là ảnh',
        'file-anh.mimes'=>'Ảnh có kích thước quá lớn'
        ];
    } 
}
