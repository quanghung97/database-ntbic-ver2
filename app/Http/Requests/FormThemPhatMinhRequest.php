<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormThemPhatMinhRequest extends FormRequest
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
    public function response(array $errors){

        return \Redirect::back()->withErrors($errors)->withInput();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten' => 'required',
            'sobang_kyhieu' => 'required',
            'ngay_cong_bo' => 'required',
            'ngay_cap' => 'required',
            'chu_so_huu_chinh' => 'required',
            'tac_gia' => 'required',
            'linh_vuc_khcn' => 'required',
            'loai_phat_minh_sang_che' => 'required',
            'file-anh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'ten.required' => 'Chưa nhập tên cho phát minh!',
            'sobang_kyhieu.required' => 'Chưa nhập số bằng - ký hiệu!',
            'ngay_cong_bo.required' => 'Chưa nhập ngày công bố!',
            'ngay_cap.required' => 'Chưa nhập ngày cấp!',
            'chu_so_huu_chinh.required' => 'Chưa nhập dữ liệu!',
            'tac_gia.required' => 'Chưa nhập dữ liệu!',
            'linh_vuc_khcn.required' => 'Chưa nhập dữ liệu!',
            'loai_phat_minh_sang_che.required' => 'Chưa nhập dữ liệu!',
            'file-anh.image'=>'Vui lòng chọn file có định dạng là ảnh',
            'file-anh.mimes'=>'Vui lòng chọn file có định dạng là ảnh',
            'file-anh.mimes'=>'Ảnh có kích thước quá lớn'
        ];
    } 
}
