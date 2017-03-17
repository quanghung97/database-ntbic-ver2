<?php

namespace App\Http\Controllers\manager\database_manager\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\bang_phat_minh_sang_che;
use Illuminate\Support\Facades\Input;


class NewController extends Controller
{
	public function index(){
		return view('database_manager.phat_minh.new');
	}

	public function new_action(Request $request){
       $ten=$request->ten;
       $sobang_kyhieu=$request->sobang_kyhieu;
       $ngay_cong_bo=$request->ngay_cong_bo;
       $ngay_cap=$request->ngay_cap;
       $chu_so_huu_chinh=$request->chu_so_huu_chinh;
       $tac_gia=$request->tac_gia;
       $diem_noi_bat=$request->diem_noi_bat;
       $mota_sangche_phatminh_giaiphap=$request->mota_sangche_phatminh_giaiphap;
       $noidung_cothe_chuyengiao=$request->nd_chuyengiao;
       $thitruong_ungdung=$request->thitruong_ungdung;
       $hinh_anh_minh_hoa=$request->hinh_anh_minh_hoa;
       $link=$request->link;
       $linh_vuc_khcn=$request->linh_vuc_khcn;
       $loai_phat_minh_sang_che=$request->loai_phat_minh_sang_che;

        function remove_unicode($str){    if ($str == '')        return false;    $str = trim($str);    $chars = array(            'a'=>array(                    'ấ',                    'ầ',                    'ẩ',                    'ẫ',                    'ậ',                    'Ấ',                    'Ầ',                    'Ẩ',                    'Ẫ',                    'Ậ',                    'ắ',                    'ằ',                    'ẳ',                    'ẵ',                    'ặ',                    'Ắ',                    'Ằ',                    'Ẳ',                    'Ẵ',                    'Ặ',                    'á',                    'à',                    'ả',                    'ã',                    'ạ',                    'â',                    'ă',                    'Á',                    'À',                    'Ả',                    'Ã',                    'Ạ',                    'Â',                    'Ă'            ),            'e'=>array(                    'ế',                    'ề',                    'ể',                    'ễ',                    'ệ',                    'Ế',                    'Ề',                    'Ể',                    'Ễ',                    'Ệ',                    'é',                    'è',                    'ẻ',                    'ẽ',                    'ẹ',                    'ê',                    'É',                    'È',                    'Ẻ',                    'Ẽ',                    'Ẹ',                    'Ê'            ),            'i'=>array(                    'í',                    'ì',                    'ỉ',                    'ĩ',                    'ị',                    'Í',                    'Ì',                    'Ỉ',                    'Ĩ',                    'Ị',                    'î'            ),            'o'=>array(                    'ố',                    'ồ',                    'ổ',                    'ỗ',                    'ộ',                    'Ố',                    'Ồ',                    'Ổ',                    'Ô',                    'Ộ',                    'ớ',                    'ờ',                    'ở',                    'ỡ',                    'ợ',                    'Ớ',                    'Ờ',                    'Ở',                    'Ỡ',                    'Ợ',                    'ó',                    'ò',                    'ỏ',                    'õ',                    'ọ',                    'ô',                    'ơ',                    'Ó',                    'Ò',                    'Ỏ',                    'Õ',                    'Ọ',                    'Ô',                    'Ơ'            ),            'u'=>array(                    'ứ',                    'ừ',                    'ử',                    'ữ',                    'ự',                    'Ứ',                    'Ừ',                    'Ử',                    'Ữ',                    'Ự',                    'ú',                    'ù',                    'ủ',                    'ũ',                    'ụ',                    'ư',                    'Ú',                    'Ù',                    'Ủ',                    'Ũ',                    'Ụ',                    'Ư'            ),            'y'=>array(                    'ý',                    'ỳ',                    'ỷ',                    'ỹ',                    'ỵ',                    'Ý',                    'Ỳ',                    'Ỷ',                    'Ỹ',                    'Ỵ'            ),            'd'=>array(                    'đ',                    'Đ'            ),            ''=>array(                    '/',                    '\\',                    ',',                    '.',                    '"',                    '\"',                    '-',                    "&quot;",                    '*',                    '{',                    '}',                    '<',                    '>',                    '(',                    ')',                    '&lt;',                    '&gt;',                    '?',                    "'",                    "\'",                    '~',                    '#',                    '^',                    '“',                    '”',                    ':',                    ';',                    '&',                    '&amp;',                    '+',                    '=',                    '%',                    '$',                    '@',                    '!',                    "'"            ),            'pc'=>array(                    '%'            ),            '-'=>array(                    ' ',                    '%20',                    '_'            )    );    foreach ($chars as $key=>$arr)        foreach ($arr as $val)            $str = str_replace($val, $key, $str);
    	return $str;}

        //Validation
        $rules = array('ten' => 'required', 'sobang_kyhieu' => 'required','ngay_cong_bo' => 'required','ngay_cap' => 'required','chu_so_huu_chinh' => 'required','tac_gia' => 'required','linh_vuc_khcn' => 'required','loai_phat_minh_sang_che' => 'required');
        $messages = [
            'ten.required' => 'Chưa nhập tên cho phat minh!',
            'sobang_kyhieu.required' => 'Chưa nhập số bằng - ký hiệu!',
            'ngay_cong_bo.required' => 'Chưa nhập ngày công bố!',
            'ngay_cap.required' => 'Chưa nhập ngày cấp!',
            'chu_so_huu_chinh.required' => 'Chưa nhập dữ liệu!',
            'tac_gia.required' => 'Chưa nhập dữ liệu!',
            'linh_vuc_khcn.required' => 'Chưa nhập dữ liệu!',
            'loai_phat_minh_sang_che.required' => 'Chưa nhập dữ liệu!',
        ];

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            return Redirect::to('quan-tri-vien/quan-ly-du-lieu/phat-minh/tao-moi')->withInput()->withErrors($validator);
        }
        else {
              $link = remove_unicode($ten);

              bang_phat_minh_sang_che::insert([
              'ten' => $ten,
              'sobang_kyhieu' => $sobang_kyhieu,
              'ngay_cong_bo' => $ngay_cong_bo,
              'ngay_cap' => $ngay_cap,
              'chu_so_huu_chinh' => $chu_so_huu_chinh,
              'tac_gia' => $tac_gia,
              'diem_noi_bat' => $diem_noi_bat,
              'mota_sangche_phatminh_giaiphap' => $mota_sangche_phatminh_giaiphap,
              'noidung_cothe_chuyengiao' => $noidung_cothe_chuyengiao,
              'thitruong_ungdung' => $thitruong_ungdung,
              'hinh_anh_minh_hoa' => $hinh_anh_minh_hoa,
              'link' =>$link,
              'linh_vuc_khcn' =>$linh_vuc_khcn,
              'loai_phat_minh_sang_che' =>$loai_phat_minh_sang_che,
              ]);
            return Redirect::back()->with('status', 'Thêm thành công một phát minh!');
        }
    }
    
}
