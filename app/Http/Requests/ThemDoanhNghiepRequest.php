<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemDoanhNghiepRequest extends FormRequest
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
            'name' => 'required',
            'dia_chi' => 'required',
            'linh_vuc' => 'required',
            'tinh_thanh_pho' => 'required',
            'email' => 'required',
            'ten_dai_dien' => 'required',
            'dia_chi_dai_dien' => 'required',
            'email_dai_dien' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên doanh nghiệp',
            'dia_chi.required'=>'Vui lòng nhập địa chỉ trụ sở doanh nghiệp',
            'linh_vuc.required' =>'Vui lòng nhập lĩnh vực KH&CN',
            'tinh_thanh_pho.required' => 'Vui lòng nhập email doanh nghiệp',
            'ten_dai_dien.required' => 'Vui lòng nhập tên người đại diện',
            'dia_chi_dai_dien.required' => 'Vui lòng nhập địa chỉ người đại diện',
            'email_dai_dien.required' => 'Vui lòng nhập email người đại diện',
            'logo.image' => 'Vui lòng chọn logo là 1 ảnh',
        ];
    } 
}
