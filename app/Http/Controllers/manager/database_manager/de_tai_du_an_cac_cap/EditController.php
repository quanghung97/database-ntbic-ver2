<?php

namespace App\Http\Controllers\manager\database_manager\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\de_tai_du_an_cac_cap;
use Illuminate\Support\Facades\Input;
use DB;
use App\chuyen_nganh_khcn;

class EditController extends Controller
{
    public function index(Request $request){
    	$id = $request->id;
    	$result = DB::table('de_tai_du_an_cac_cap')->select('ten_de_tai','maso_kyhieu','linh_vuc','co_quan','nam_bat_dau','nam_ket_thuc','chu_nhiem_detai','chuyen_nganh_khcn','diem_noi_bat','mota_chung','mota_quytrinh_chuyengiao','ket_qua_thuc_hien_ung_dung')->where('id',$id)->first();
		$rel = chuyen_nganh_khcn::select('id','ten')->get();
    	return view('database_manager.de_tai_du_an_cac_cap.edit')->with(['data'=>$result,'datas'=>$rel]);
	}

	public function edit_action(Request $request){
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
        $id = $request->id;
        //Validation
        $rules = array('ten_de_tai' => 'required', 'maso_kyhieu' => 'required','chu_nhiem_detai' => 'required',);
        $messages = [
            'ten_de_tai.required' => 'Chưa nhập tên cho đề tài!',
            'maso_kyhieu.required' => 'Chưa nhập Mã số - Ký hiệu!',
            'chu_nhiem_detai.required' => 'Chưa nhập tên của chủ nhiệm cho đề tài này!',
        ];

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            return Redirect::to('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap/sua/'.$id)->withInput()->withErrors($validator);
        }
        else {
        	de_tai_du_an_cac_cap::where('id',$id)->update([
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
        		]);

        	return Redirect::to('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap/sua/'.$id)->withInput()->with('status', 'Sửa thành công một đề tài dự án!');
        }
	}
}
