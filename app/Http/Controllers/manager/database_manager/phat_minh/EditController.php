<?php
namespace App\Http\Controllers\manager\database_manager\phat_minh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\bang_phat_minh_sang_che;
use Illuminate\Support\Facades\Input;
use DB;

class EditController extends Controller
{
	public function stripVN($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/",'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);

    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = str_replace("/(Đ)/", 'D', $str);
    $str=str_replace(" ", "-", $str);
    return $str;

}
    public function index($id)
    {
    	$pm=bang_phat_minh_sang_che::find($id);
    	return view('database_manager.phat_minh.edit')->with(['phat_minh'=>$pm]);
    }
   public function edit_action(Request $request){
       $id = $request->id;
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
        	bang_phat_minh_sang_che::where('id',$id)->update([
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
        	return Redirect::back()->with('status', 'Sửa thành công một phát minh!');
        }
    }
}
