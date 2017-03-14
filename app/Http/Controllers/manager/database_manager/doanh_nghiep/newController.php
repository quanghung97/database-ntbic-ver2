<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Requests\ThemDoanhNghiepRequest;
use App\Http\Controllers\Controller;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;
use App\doanh_nghiep_khcn;
use Carbon\Carbon;

class NewController extends Controller
{
	
     public function index() {
     	$linh_vuc = linh_vuc_san_pham::all();
     	$tinh_thanh_pho = tinh_thanh_pho::all();
     	return view('database_manager.doanh_nghiep.new')->with(['tinh_thanh'=>$tinh_thanh_pho,'linh_vuc'=>$linh_vuc]);
     }

     public function new_action(ThemDoanhNghiepRequest $request) {
     	$entry = new doanh_nghiep_khcn;
     	$entry->logo = '';
     	$entry->ngay_cap_nhat = Carbon::now();
     	$entry->link = '';

     	$entry->ten_doanh_nghiep = $request->name;
     	$entry->dia_chi = $request->dia_chi;
     	$entry->linh_vuc = $request->linh_vuc;
     	$entry->tinh_thanh_pho = $request->tinh_thanh_pho;
     	$entry->nganh_nghe_kinh_doanh = $request->nganh_nghe_kinh_doanh;
     	$entry->email = $request->email;
     	$entry->phone = $request->phone;
     	$entry->fax = $request->fax;
     	$entry->website = $request->website;
     	$entry->ma_so_thue = $request->ma_so_thue;
     	$entry->loai_hinh = $request->loai_hinh;
     	$entry->ngay_dang_ky = $request->ngay_dang_ki;
     	$entry->ten_dai_dien = $request->ten_dai_dien;
     	$entry->email_dai_dien = $request->email_dai_dien;
     	$entry->phone_dai_dien = $request->sdt_dai_dien;
     	$entry->dia_chi_dai_dien = $request->dia_chi_dai_dien;
     	$entry->van_phong_dai_dien = $request->van_phong_dai_dien;
     	$entry->so_quyet_dinh_khcn = $request->so_quyet_dinh;

          $d = str_replace('/', '-', $request->thoi_gian_dang_ky_khcn);
          $entry->thoi_gian_dang_ky_khcn = date('Y-m-d', strtotime($d));

     	$entry->noi_cap_chung_nhan_khcn = $request->noi_cap;
     	$entry->xep_hang_trinh_do_khcn = $request->xep_hang_trinh_do;
     	$entry->huong_nghien_cuu_khcn = $request->huong_nghien_cuu_khcn;
     	$entry->so_luong_can_bo_khcn = $request->so_luong_can_bo;
     	$entry->cong_nghe_noi_bat = $request->cong_nghe_noi_bat;
     	$entry->su_dung_cong_nghe =$request->su_dung_cong_nghe;
     	$entry->save();

          $link = $this->text_to_link($entry->id.'-'.$entry->ten_doanh_nghiep);
          $entry->link = substr($link,0,45);
          $entry->save();

          if($request->hasFile('logo')) {
               $logo = $request->file('logo');
               $logo_name = $entry->link.'.'.$logo->getClientOriginalExtension();
               $entry->logo = 'storage/app/public/media/doanh-nghiep/'.$logo_name;
               $logo->move('storage/app/public/media/doanh-nghiep', $logo_name);
          } else $entry->logo = 'storage/app/public/media/doanh-nghiep/default.jpg';
          $entry->save();

          return redirect('quan-tri-vien/quan-ly-du-lieu/doanh-nghiep');
     }

     public function text_to_link($string){
    $current_char = array(
        "â","ấ","ầ","ậ","ẩ","ẫ",
        "é","è","ẽ","ẹ","ẻ",
        "ê","ế","ề","ể","ệ","ễ",
        "ă","ắ","ằ","ẳ","ặ","ẵ",
        "á","à","ả","ạ","ã",
        "đ",
        "ý","ỳ","ỵ","ỷ","ỹ",
        "ú","ù","ụ","ũ","ủ",
        "ư","ứ","ừ","ử","ữ","ự",
        "í","ì","ị","ỉ","ĩ",
        "ó","ò","õ","ọ","ỏ",
        "ô","ố","ồ","ộ","ổ","ỗ",
        "ơ","ở","ợ","ờ","ỡ","ớ",
        " ",
        "Â","Ấ","Ầ","Ậ","Ẩ","Ẫ",
        "É","È","Ẽ","Ẹ","Ẻ",
        "Ê","Ế","Ề","Ẻ","Ệ","Ễ",
        "Ă","Ă","Ằ","Ẳ","Ặ","Ẵ",
        "Á","À","Ả","Ạ","Ã",
        "Đ",
        "Ý","Ỳ","Ỵ","Ỷ","Ỹ",
        "Ú","Ù","Ụ","Ũ","Ủ",
        "Ư","Ứ","Ừ","Ử","Ự","Ữ",
        "Í","Ì","Ị","Ỉ","Ĩ",
        "Ó","Ò","Õ","Ọ","Ỏ",
        "Ô","Ố","Ồ","Ộ","Ổ","Ỗ",
        "Ơ","Ở","Ợ","Ờ","Ỡ","Ớ");
    $new_char = array(
        "a","a","a","a","a","a",
        "e","e","e","e","e",
        "e","e","e","e","e","e",
        "a","a","a","a","a","a",
        "a","a","a","a","a",
        "d",
        "y","y","y","y","y",
        "u","u","u","u","u",
        "u","u","u","u","u","u",
        "i","i","i","i","i",
        "o","o","o","o","o",
        "o","o","o","o","o","o",
        "o","o","o","o","o","o",
        "-",
        "a","a","a","a","a","a",
        "e","e","e","e","e",
        "e","e","e","e","e","e",
        "a","a","a","a","a","a",
        "a","a","a","a","a",
        "d",
        "y","y","y","y","y",
        "u","u","u","u","u",
        "u","u","u","u","u","u",
        "i","i","i","i","i",
        "o","o","o","o","o",
        "o","o","o","o","o","o",
        "o","o","o","o","o","o");

    $new = str_replace($current_char,$new_char,$string);
    $new = strtolower($new);
    $length = strlen($new);
    for($i = 0; $i < $length; $i++){
        $ascii =  ord($new[$i]);
           if(!($ascii < 123 && $ascii > 96 || $ascii > 47 && $ascii < 58 || $new[$i] == '-')){
               $new[$i] = '-';
           }
    }
    $new= ltrim($new,'-');
    $new = rtrim($new,'-');
    while(strpos($new,'--') != false){
        $new = str_replace("--","-",$new);
    }
    return $new;
}
}
