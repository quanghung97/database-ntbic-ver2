<?php
namespace App\Http\Controllers\manager\database_manager\phat_minh;
use Illuminate\Http\Request;
use App\Http\Requests\FormThemPhatMinhRequest;
use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\bang_phat_minh_sang_che;
use Illuminate\Support\Facades\Input;
use DB;
use App\linh_vuc_khcn;
use App\loai_phat_minh_sang_che;

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
      $lv=linh_vuc_khcn::select('id','linh_vuc')->get();
      $lpm=loai_phat_minh_sang_che::all();
    	$pm=bang_phat_minh_sang_che::find($id);
    	return view('database_manager.phat_minh.edit')->with(['phat_minh'=>$pm, 'linh_vuc_khcn'=>$lv,'loai_phat_minh_sang_che'=>$lpm]);
    }
   public function edit_action(FormThemPhatMinhRequest $request, $id){
       $phat_minh=bang_phat_minh_sang_che::find($id);
       $phat_minh->ten=$request->ten;
       $phat_minh->sobang_kyhieu=$request->sobang_kyhieu;
       $phat_minh->ngay_cong_bo=$request->ngay_cong_bo;
       $phat_minh->ngay_cap=$request->ngay_cap;
       $phat_minh->chu_so_huu_chinh=$request->chu_so_huu_chinh;
       $phat_minh->tac_gia=$request->tac_gia;
       $phat_minh->diem_noi_bat=$request->diem_noi_bat;
       $phat_minh->mota_sangche_phatminh_giaiphap=$request->mota_sangche_phatminh_giaiphap;
       $phat_minh->noidung_cothe_chuyengiao=$request->noidung_cothe_chuyengiao;
       $phat_minh->thitruong_ungdung=$request->thitruong_ungdung;
       $text=$id.$this->stripVN($request->ten);
       $text1=substr($text,0,45);
       $phat_minh->link=$text1;
       $phat_minh->linh_vuc_khcn=$request->linh_vuc_khcn;
       $phat_minh->loai_phat_minh_sang_che=$request->loai_phat_minh_sang_che;
        if($request->hasFile('file-anh')){
          $logo = $request->file('file-anh');
               $logo_name = $text1.'.'.$logo->getClientOriginalExtension();
               $phat_minh->hinh_anh_minh_hoa = 'storage/app/public/media/pmsc/'.$logo_name;
               $logo->move('storage/app/public/media/pmsc', $logo_name);
       }
     
      $phat_minh->save();
      return Redirect::back()->with('status', 'Sửa thành công chuyên gia!');
    }
}
