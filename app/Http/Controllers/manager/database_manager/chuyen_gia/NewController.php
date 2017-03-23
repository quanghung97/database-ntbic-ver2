<?php
namespace App\Http\Controllers\manager\database_manager\chuyen_gia;
use App\chuyen_gia_khcn;
use App\tinh_thanh_pho;
use App\hoc_vi;
use App\ket_qua_nghien_cuu;
use App\cong_trinh_nghien_cuu;
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
        if(strlen(trim($request->ho_va_ten))==0){
          $errors[]="họ và tên không được rỗng";
          return json_encode(['errors'=>$errors]);
        }
        if(strlen(trim($request->ho_va_ten))>45)
        {
          $errors[]="họ và tên quá dài";
          return json_encode(['errors'=>$errors]);
        }
        if(strlen(trim($request->nam_sinh))==0)
        {
          $errors[]="năm sinh không được rỗng";
          return json_encode(['errors'=>$errors]);
        }
        if(strlen(trim($request->nam_sinh))<4)
        {
          $errors[]="kiểm tra lại năm sinh";
          return json_encode(['errors'=>$errors]);
        }
        if(strlen(trim($request->hoc_vi))>0){
             $chuyen_gia=new chuyen_gia_khcn;
             $chuyen_gia->ho_va_ten=$request->ho_va_ten;
             $chuyen_gia->hoc_vi=$request->hoc_vi;
             $chuyen_gia->nam_sinh=$request->nam_sinh;
             $chuyen_gia->chuyen_nganh=$request->chuyen_nganh;
             $chuyen_gia->co_quan=$request->co_quan;
             $chuyen_gia->dia_chi_co_quan=$request->dia_chi_co_quan;
             $chuyen_gia->huong_nghien_cuu=$request->huong_nghien_cuu;
             $chuyen_gia->Sl_congTrinh_baiBao=$request->so_cong_trinh;
             $chuyen_gia->tinh_thanh=$request->tinh_thanh;
             $chuyen_gia->save();


             // insert cong trinh nghien cuu va ket qua nghien cuu
             if(substr(trim($request->ket_qua_nghien_cuu),0,1)=='+'){
                $ket_qua=explode("+", substr(trim($request->ket_qua_nghien_cuu),1));
             }
             else{
              $ket_qua=explode("+",trim($request->ket_qua_nghien_cuu));
             }
              $kq_size=count($ket_qua);

              if(substr(trim($request->cong_trinh_nghien_cuu),0,1)=='+'){
                $cong_trinh=explode("+", substr(trim($request->cong_trinh_nghien_cuu),1));
              }
              else{
                $cong_trinh=explode("+",trim($request->cong_trinh_nghien_cuu));
              }
              $ct_size=count($cong_trinh);
              for($i=0;$i<$kq_size;$i++)
              {
                if(trim($ket_qua[$i]!='x') && strlen(trim($ket_qua[$i]))>0){
                ket_qua_nghien_cuu::insert([
                  'id_profile'=>$chuyen_gia->id,
                  'content'=>$ket_qua[$i],
                  ]);
                }
              }
              for($i=0;$i<$ct_size;$i++)
              {
                if(trim($cong_trinh[$i]!='x')&& strlen(trim($cong_trinh[$i]))>0)
                {
                cong_trinh_nghien_cuu::insert([
                  'id_profile'=>$chuyen_gia->id,
                  'content'=>$cong_trinh[$i],
                  ]);
                }
              }
              return json_encode(['errors'=>'']);
            //thêm chuyên gia thành công
        }
        else if(strlen(trim($request->hoc_vi))==0)
        {
          $errors[]="học vị không được rỗng";
          return json_encode(['errors'=>$errors]);
        }
        // $cong_trinh=$request->cong_trinh_nghien_cuu;
        // $ket_qua=$request->ket_qua_nghien_cuu;

        $errors[] = 'Lỗi thêm dữ liệu chưa xác định !';
        return json_encode(['errors'=>$errors]);
    }
}
