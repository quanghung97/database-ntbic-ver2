<?php

namespace App\Http\Controllers\manager\database_manager\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\de_tai_du_an_cac_cap;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\FlashServiceProvider;


class NewController extends Controller
{
	public function index(){
		return view('database_manager.de_tai_du_an_cac_cap.new');
	}

	public function new_action(Request $request){
    	$ten_de_tai = $request->ten_de_tai;
    	$maso_kyhieu = $request->maso_kyhieu;
    	$linh_vuc = $request->linh_vuc;
    	$chuyen_nganh_khcn = $request->chuyen_nganh_khcn;
    	$nam_bat_dau = $request->nam_bat_dau;
    	$nam_ket_thuc = $request->nam_ket_thuc;
    	$co_quan = $request->co_quan;
    	$chu_nhiem_detai = $request->chu_nhiem_detai;
    	$diem_noi_bat = $request->diem_noi_bat;
        $mota_chung = $request->mota_chung;
        $mota_quytrinh_chuyengiao = $request->mota_quytrinh_chuyengiao;
        $ket_qua_thuc_hien_ung_dung = $request->ket_qua_thuc_hien_ung_dung;

        function remove_unicode($str){    if ($str == '')        return false;    $str = trim($str);    $chars = array(            'a'=>array(                    'ấ',                    'ầ',                    'ẩ',                    'ẫ',                    'ậ',                    'Ấ',                    'Ầ',                    'Ẩ',                    'Ẫ',                    'Ậ',                    'ắ',                    'ằ',                    'ẳ',                    'ẵ',                    'ặ',                    'Ắ',                    'Ằ',                    'Ẳ',                    'Ẵ',                    'Ặ',                    'á',                    'à',                    'ả',                    'ã',                    'ạ',                    'â',                    'ă',                    'Á',                    'À',                    'Ả',                    'Ã',                    'Ạ',                    'Â',                    'Ă'            ),            'e'=>array(                    'ế',                    'ề',                    'ể',                    'ễ',                    'ệ',                    'Ế',                    'Ề',                    'Ể',                    'Ễ',                    'Ệ',                    'é',                    'è',                    'ẻ',                    'ẽ',                    'ẹ',                    'ê',                    'É',                    'È',                    'Ẻ',                    'Ẽ',                    'Ẹ',                    'Ê'            ),            'i'=>array(                    'í',                    'ì',                    'ỉ',                    'ĩ',                    'ị',                    'Í',                    'Ì',                    'Ỉ',                    'Ĩ',                    'Ị',                    'î'            ),            'o'=>array(                    'ố',                    'ồ',                    'ổ',                    'ỗ',                    'ộ',                    'Ố',                    'Ồ',                    'Ổ',                    'Ô',                    'Ộ',                    'ớ',                    'ờ',                    'ở',                    'ỡ',                    'ợ',                    'Ớ',                    'Ờ',                    'Ở',                    'Ỡ',                    'Ợ',                    'ó',                    'ò',                    'ỏ',                    'õ',                    'ọ',                    'ô',                    'ơ',                    'Ó',                    'Ò',                    'Ỏ',                    'Õ',                    'Ọ',                    'Ô',                    'Ơ'            ),            'u'=>array(                    'ứ',                    'ừ',                    'ử',                    'ữ',                    'ự',                    'Ứ',                    'Ừ',                    'Ử',                    'Ữ',                    'Ự',                    'ú',                    'ù',                    'ủ',                    'ũ',                    'ụ',                    'ư',                    'Ú',                    'Ù',                    'Ủ',                    'Ũ',                    'Ụ',                    'Ư'            ),            'y'=>array(                    'ý',                    'ỳ',                    'ỷ',                    'ỹ',                    'ỵ',                    'Ý',                    'Ỳ',                    'Ỷ',                    'Ỹ',                    'Ỵ'            ),            'd'=>array(                    'đ',                    'Đ'            ),            ''=>array(                    '/',                    '\\',                    ',',                    '.',                    '"',                    '\"',                    '-',                    "&quot;",                    '*',                    '{',                    '}',                    '<',                    '>',                    '(',                    ')',                    '&lt;',                    '&gt;',                    '?',                    "'",                    "\'",                    '~',                    '#',                    '^',                    '“',                    '”',                    ':',                    ';',                    '&',                    '&amp;',                    '+',                    '=',                    '%',                    '$',                    '@',                    '!',                    "'"            ),            'pc'=>array(                    '%'            ),            '-'=>array(                    ' ',                    '%20',                    '_'            )    );    foreach ($chars as $key=>$arr)        foreach ($arr as $val)            $str = str_replace($val, $key, $str);
    	return $str;}

        //Validation
        $rules = array('ten_de_tai' => 'required', 'maso_kyhieu' => 'required','chu_nhiem_detai' => 'required','chuyen_nganh_khcn' => 'required',);
        $messages = [
            'ten_de_tai.required' => 'Chưa nhập tên cho đề tài!',
            'maso_kyhieu.required' => 'Chưa nhập Mã số - Ký hiệu!',
            'chu_nhiem_detai.required' => 'Chưa nhập tên của chủ nhiệm cho đề tài này!',
            'chuyen_nganh_khcn.required' => 'Chưa nhập số liệu cho chuyên ngành!',
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return Redirect::to('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap/tao-moi')->withInput()->withErrors($validator);
        }
        else {
        	$link = remove_unicode($ten_de_tai);

        	de_tai_du_an_cac_cap::insert([
        		'ten_de_tai' => $ten_de_tai,
        		'maso_kyhieu' => $maso_kyhieu,
        		'linh_vuc' => $linh_vuc,
        		'chuyen_nganh_khcn' => $chuyen_nganh_khcn,
        		'nam_bat_dau' => $nam_bat_dau,
        		'nam_ket_thuc' => $nam_ket_thuc,
        		'co_quan' => $chu_nhiem_detai,
        		'diem_noi_bat' => $diem_noi_bat,
        		'mota_chung' => $mota_chung,
        		'mota_quytrinh_chuyengiao' => $mota_quytrinh_chuyengiao,
        		'ket_qua_thuc_hien_ung_dung' => $ket_qua_thuc_hien_ung_dung,
        		'link' => $link
        		]);
        	$request->session()->flash('alert', 'Thêm thành công một đề tài dự án');
        	flash('Thêm thành công một đề tài dự án', 'success');
        	return Redirect::to('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap');
        }
    }
    
}
