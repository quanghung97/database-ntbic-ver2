<?php
namespace App\Http\Controllers\manager\database_manager\chuyen_gia;
use App\chuyen_gia_khcn;
use App\tinh_thanh_pho;
use App\hoc_vi;
use Carbon\Carbon;
use App\Http\Requests\FormThemChuyenGiaRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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
      $hv=hoc_vi::all();
      $tp=tinh_thanh_pho::all();
    	return view('database_manager.chuyen_gia.new')->with(['hoc_vi'=>$hv, 'tinh_thanh'=>$tp]);
    }


    public function new_action(FormThemChuyenGiaRequest $request)
    {
       $chuyen_gia=new chuyen_gia_khcn;
       $chuyen_gia->ho_va_ten=$request->ten;
       $chuyen_gia->hoc_vi=$request->hoc_vi;
       $chuyen_gia->nam_sinh=$request->nam_sinh;
       $chuyen_gia->chuyen_nganh=$request->chuyen_nganh;
       $chuyen_gia->co_quan=$request->co_quan;
       $chuyen_gia->dia_chi_co_quan=$request->dia_chi_co_quan;
       $chuyen_gia->huong_nghien_cuu=$request->huong_nghien_cuu;
       $chuyen_gia->Sl_congTrinh_baiBao=$request->so_cong_trinh;
       $chuyen_gia->tinh_thanh=$request->tinh_thanh_pho;
       $chuyen_gia->save();
       $id=$chuyen_gia->id;
       $nam_sinh=$chuyen_gia->nam_sinh;
       $ten=$chuyen_gia->ho_va_ten;
       $chuyen_gia1=chuyen_gia_khcn::find($id);
       $text=$this->stripVN($ten).'-'.$id.'-'.str_replace("/", "", $nam_sinh);
       $chuyen_gia1->linkid=$text;

       if($request->hasFile('file-anh')){
          $logo = $request->file('file-anh');
               $logo_name = $text.'.'.$logo->getClientOriginalExtension();
               $chuyen_gia1->link_anh = 'storage/app/public/media/profile_khcn/'.$logo_name;
               $logo->move('storage/app/public/media/profile_khcn', $logo_name);
       }
       else{
       		$chuyen_gia1->link_anh='/storage/app/public/media/profile_khcn/default.jpg';
       }
       $chuyen_gia1->save();
       return Redirect::back()->with('status', 'Thêm thành công một chuyên gia!');
    }

    protected function ajax_new_record(Request $request)
    {

        $errors = [];
        // mảng chứa các lỗi. $errors
        // ví dụ khi validate dữ liệu. Trường họ và tên bị rỗng thì thêm lỗi bằng cách
        // $errors[] = Họ và tên không được rỗng !
        // return json_encode(['errors'=>'']) để trả về danh sách lỗi. trong code javascript đã có code để hiện
        $check = false;
        if(chuyen_gia_khcn::insert([
              'ho_va_ten' => $request->ho_va_ten,
              'nam_sinh' => $request->nam_sinh,
              'hoc_vi' => $request->hoc_vi,
              'chuyen_nganh'=> $request->chuyen_nganh,
              'tinh_thanh'=> $request->tinh_thanh,
              'co_quan' => $request->co_quan,
              'dia_chi_co_quan' => $request->dia_chi_co_quan,
              'huong_nghien_cuu' => $request->huong_nghien_cuu,
              'Sl_congTrinh_baiBao' => $request->so_cong_trinh,
          ])){
              return json_encode(['errors'=>'']);
            //thêm chuyên gia thành công
        }

        $errors[] = 'Lỗi thêm dữ liệu chưa xác định !';
        return json_encode(['errors'=>$errors]);
    }
}
