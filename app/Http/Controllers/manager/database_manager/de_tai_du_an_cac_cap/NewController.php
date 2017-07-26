<?php

namespace App\Http\Controllers\manager\database_manager\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\de_tai_du_an_cac_cap;
use Illuminate\Support\Facades\Input;
use App\chuyen_nganh_khcn;
use Elasticsearch\ClientBuilder;
use App\Http\Requests\ThemDeTaiRequest;


class NewController extends Controller
{
    public function index(){
        $result = chuyen_nganh_khcn::select('id','ten')->get();
        return view('database_manager.de_tai_du_an_cac_cap.new')->with(['datas'=>$result]);
    }
    
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
 

    public function new_action(ThemDeTaiRequest $request){
        $detai = new de_tai_du_an_cac_cap;
        $detai->ten_de_tai = $request->ten_de_tai;
        $detai->maso_kyhieu = $request->maso_kyhieu;
        $detai->linh_vuc = $request->linh_vuc;
        $detai->chuyen_nganh_khcn = $request->chuyen_nganh_khcn;
        $detai->nam_bat_dau = $request->nam_bat_dau;
        $detai->nam_ket_thuc = $request->nam_ket_thuc;
        $detai->co_quan = $request->co_quan;
        $detai->chu_nhiem_detai = $request->chu_nhiem_detai;
        $detai->diem_noi_bat = $request->diem_noi_bat;
        $detai->mota_chung = $request->mota_chung;
        $detai->mota_quytrinh_chuyengiao = $request->mota_quytrinh_chuyengiao;
        $detai->ket_qua_thuc_hien_ung_dung = $request->ket_qua_thuc_hien_ung_dung;
        $detai->save();
        $id = $detai->id;
        $ten = $detai->ten_de_tai;
        $text=$this->stripVN($ten).'-'.$id;
        $detai->link = $text;
        // code này ai làm nếu có thời gian đề nghị sửa lại link gán thêm id và check lỗi qua Requests 
     
        //Validation
      

        
            
            $detai->save();
           
            //sync with elasticDB(indexing) 
       $add = de_tai_du_an_cac_cap::find($id);
        $add->addToIndex();
        
            return Redirect::back()->with('status', 'Thêm thành công một đề tài!');
        }
    

    protected function ajax_new_record(Request $request)
    {

        


        $errors = [];
        // mảng chứa các lỗi. $errors
        // ví dụ khi validate dữ liệu. Trường họ và tên bị rỗng thì thêm lỗi bằng cách
        // $errors[] = Họ và tên không được rỗng !
        // return json_encode(['errors'=>'']) để trả về danh sách lỗi. trong code javascript đã có code để hiện
       
        $detai = new de_tai_du_an_cac_cap;
        $detai->ten_de_tai = $request->ten_de_tai;
        $detai->maso_kyhieu = $request->maso_kyhieu;
        $detai->linh_vuc = $request->linh_vuc;
        $detai->chuyen_nganh_khcn = $request->chuyen_nganh_khcn;
        $detai->nam_bat_dau = $request->nam_bat_dau;
        $detai->nam_ket_thuc = $request->nam_ket_thuc;
        $detai->co_quan = $request->co_quan;
        $detai->chu_nhiem_detai = $request->chu_nhiem_detai;
        $detai->diem_noi_bat = $request->diem_noi_bat;
        $detai->mota_chung = $request->mota_chung;
        $detai->mota_quytrinh_chuyengiao = $request->mota_quytrinh_chuyengiao;
        $detai->ket_qua_thuc_hien_ung_dung = $request->ket_qua_thuc_hien_ung_dung;
        $detai->save();
        $id = $detai->id;
        $ten = $detai->ten_de_tai;
        $text=$this->stripVN($ten).'-'.$id;
        $detai->link = $text;
        $detai->save();
        
        if($detai->save()){
               //sync elasticDB(indexing)
            $add = de_tai_du_an_cac_cap::find($id);
            $add->addToIndex();
              return json_encode(['errors'=>'']);
            //thêm chuyên gia thành công
          //de_tai_du_an_cac_cap::where('ten_de_tai',$request->ten_de_tai)->update('link',$link);
        }

        $errors[] = 'Lỗi thêm dữ liệu chưa xác định !';
        return json_encode(['errors'=>$errors]);
    }
    
}
