<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Requests\ThemDoanhNghiepRequest;
use App\Http\Controllers\Controller;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;
use App\doanh_nghiep_khcn;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Redirect;
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
               $entry->logo = '/storage/app/public/media/doanh-nghiep/'.$logo_name;
               $logo->move('storage/app/public/media/doanh-nghiep', $logo_name);
          } else $entry->logo = '/storage/app/public/media/doanh-nghiep/default.jpg';
          $entry->save();

          return Redirect::back()->with('status', 'Thêm thành công một doanh nghiệp!');
    }

    public function add_by_excel(Request $request) {
        $error = [];

        //make validate
        $rules = [
            'name' => 'required',
            'dia_chi' => 'required',
            'linh_vuc' => 'required',
            'tinh_thanh_pho' => 'required',
            'email' => 'required',
            'ten_dai_dien' => 'required',
            'dia_chi_dai_dien' => 'required',
            'email_dai_dien' => 'required',
        ];
        $messages = [
            'name.required' => 'Vui lòng nhập tên doanh nghiệp',
            'dia_chi.required'=>'Vui lòng nhập địa chỉ trụ sở doanh nghiệp',
            'linh_vuc.required' =>'Vui lòng nhập lĩnh vực KH&CN',
            'tinh_thanh_pho.required' => 'Vui lòng nhập email doanh nghiệp',
            'ten_dai_dien.required' => 'Vui lòng nhập tên người đại diện',
            'dia_chi_dai_dien.required' => 'Vui lòng nhập địa chỉ người đại diện',
            'email_dai_dien.required' => 'Vui lòng nhập email người đại diện',
        ];
        $validator = Validator::make([
                'name' => $request->name,
                'dia_chi' => $request->dia_chi,
                'email' => $request->email,
                'ten_dai_dien' => $request->ten_dai_dien,
                'email_dai_dien' => $request->email_dai_dien,
                'dia_chi_dai_dien' => $request->dia_chi_dai_dien,
                'linh_vuc' => $request->linh_vuc,
                'tinh_thanh_pho' => $request->tinh_thanh_pho,
            ],$rules,$messages);

        //check validate
        if ($validator->fails()) {
            if($validator->errors()->first('name') != '') {
                $errors[] = $validator->errors()->first('name');
            }
            if($validator->errors()->first('dia_chi') != '') {
                $errors[] = $validator->errors()->first('dia_chi');
            }
            if($validator->errors()->first('email') != '') {
                $errors[] = $validator->errors()->first('email');
            }
            if($validator->errors()->first('ten_dai_dien') != '') {
                $errors[] = $validator->errors()->first('ten_dai_dien');
            }
            if($validator->errors()->first('dia_chi_dai_dien') != '') {
                $errors[] = $validator->errors()->first('dia_chi_dai_dien');
            }
            if($validator->errors()->first('email_dai_dien') != '') {
                $errors[] = $validator->errors()->first('email_dai_dien');
            }
            if($validator->errors()->first('tinh_thanh_pho') != '') {
                $errors[] = $validator->errors()->first('tinh_thanh_pho');
            }
            if($validator->errors()->first('linh_vuc') != '') {
                $errors[] = $validator->errors()->first('linh_vuc');
            }
            return json_encode(['errors' => $errors]);
        }
        else {
            //make new company
            $entry = new doanh_nghiep_khcn;
            $linh_vuc = linh_vuc_san_pham::where('linh_vuc',$request->linh_vuc)->first();
            if($linh_vuc == null) {
                $errors[] = 'Lĩnh vực không xác định!';
                return json_encode(['errors' => $errors]);
            } 
            $tinh_thanh_pho = tinh_thanh_pho::where('tinh_thanh_pho',$request->tinh_thanh_pho)->first();
            if($tinh_thanh_pho == null) {
                $errors[] = 'Tỉnh thành phố không xác định';
                return json_encode(['errors' => $errors]);
            }

            $entry->ngay_cap_nhat = Carbon::now();
            $entry->ten_doanh_nghiep = $request->name;
            $entry->dia_chi = $request->dia_chi;
            $entry->email = $request->email;
            $entry->ten_dai_dien = $request->ten_dai_dien;
            $entry->email_dai_dien = $request->email_dai_dien;
            $entry->dia_chi_dai_dien = $request->dia_chi_dai_dien;
            $entry->linh_vuc = $linh_vuc->id;
            $entry->tinh_thanh_pho = $tinh_thanh_pho->id;
            $entry->logo = 'storage/app/public/media/doanh-nghiep/default.jpg';
            $entry->link ='';
            $entry->save();

            $link = $this->text_to_link($entry->id.'-'.$entry->ten_doanh_nghiep);
            $entry->link = substr($link,0,45);
            $entry->save();

            return json_encode(['errors'=>'']);                                
        }
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
