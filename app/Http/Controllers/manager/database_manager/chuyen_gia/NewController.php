<?php
namespace App\Http\Controllers\manager\database_manager\chuyen_gia;
use App\chuyen_gia_khcn;
use App\Http\Requests\FormThemChuyenGiaRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class NewController extends Controller
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

    public function index()
    {
    	return view('database_manager.chuyen_gia.new');
    }


    public function new_action(FormThemChuyenGiaRequest $request)
    {
       $chuyen_gia=new chuyen_gia_khcn;
       $chuyen_gia->ho_va_ten=$request->ten;
       $chuyen_gia->hoc_vi=$request->hoc_vi;
       $chuyen_gia->nam_sinh=$request->nam_sinh;
       $chuyen_gia->chuyen_nganh=$request->chuyen_nganh;
       $chuyen_gia->co_quan=$request->co_quan;
       $chuyen_gia->huong_nghien_cuu=$request->huong_nghien_cuu;
       $chuyen_gia->Sl_congTrinh_baiBao=$request->so_cong_trinh;
       $chuyen_gia->tinh_thanh=$request->tinh_thanh;
       $chuyen_gia->save();
       $id=$chuyen_gia->id;
       $nam_sinh=$chuyen_gia->nam_sinh;
       $ten=$chuyen_gia->ho_va_ten;
       $chuyen_gia1=chuyen_gia_khcn::find($id);
       $text=$this->stripVN($ten).'-'.$id.'-'.str_replace("/", "", $nam_sinh);
       $chuyen_gia1->linkid=$text;

       if($request->hasFile('file-anh')){
       		$request->file('file-anh')->move('C:\xampp\htdocs\ntbic_data\storage\app\public\media',$text.'.jpg',$text.'.jpg');
       		$chuyen_gia1->$link_anh='/storage/app/public/media/profile_khcn/'.$text.'.jpg';
       }
       else{
       		$chuyen_gia1->link_anh='/storage/app/public/media/profile_khcn/default.jpg';
       		echo "not";
       }
       //$chuyen_gia1->save();
       //return redirect()->route('chuyen_gia');
    }
}
