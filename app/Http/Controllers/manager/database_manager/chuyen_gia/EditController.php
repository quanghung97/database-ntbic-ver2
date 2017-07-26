<?php
namespace App\Http\Controllers\manager\database_manager\chuyen_gia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chuyen_gia_khcn;
use App\hoc_vi;
use App\tinh_thanh_pho;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FormThemChuyenGiaRequest;
use File;
use Elasticsearch\ClientBuilder;

class EditController extends Controller
{
	public function stripVN($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/",'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = str_replace("đ", 'd', $str);

    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = str_replace("Đ", 'D', $str);
    $str=str_replace(" ", "-", $str);
    return $str;

}
    public function index($id)
    {
      $hv=hoc_vi::all();
      $tp=tinh_thanh_pho::all();
    	$cg=chuyen_gia_khcn::find($id);
    	return view('database_manager.chuyen_gia.edit')->with(['chuyen_gia'=>$cg,'hoc_vi'=>$hv,'tinh_thanh'=>$tp]);
    }
    public function edit_action(FormThemChuyenGiaRequest $request,$id)
    {
       $chuyen_gia=chuyen_gia_khcn::find($id);
       $hoc_vi=hoc_vi::where('hoc_vi',$request->hoc_vi)->first();
       $tinh_thanh=tinh_thanh_pho::where('tinh_thanh_pho',$request->tinh_thanh_pho)->first();
       $chuyen_gia->ho_va_ten=$request->ten;
       $chuyen_gia->hoc_vi=$request->hoc_vi;
       $chuyen_gia->nam_sinh=$request->nam_sinh;
       $chuyen_gia->chuyen_nganh=$request->chuyen_nganh;
       $chuyen_gia->co_quan=$request->co_quan;
       $chuyen_gia->dia_chi_co_quan=$request->dia_chi_co_quan;
       $chuyen_gia->huong_nghien_cuu=$request->huong_nghien_cuu;
       $chuyen_gia->Sl_congTrinh_baiBao=$request->so_cong_trinh;
       $chuyen_gia->tinh_thanh=$request->tinh_thanh_pho;
       $text=$this->stripVN($request->ten).'-'.$id.'-'.str_replace("/", "", $request->nam_sinh);
       $chuyen_gia->linkid=substr($text,0,45);
       if($request->hasFile('file-anh')){
       		$logo = $request->file('file-anh');
               $logo_name = $text.'.'.$logo->getClientOriginalExtension();
               $chuyen_gia->link_anh = 'storage/app/public/media/profile_khcn/'.$logo_name;
               $logo->move('storage/app/public/media/profile_khcn', $logo_name);
       }
       $chuyen_gia->save();
        
         if($request->delete_logo == 'delete' && $chuyen_gia->link_anh != '/storage/app/public/media/profile_khcn/default.jpg'){
           $str = substr($chuyen_gia->link_anh , 0);
          
             File::delete($str);
           $chuyen_gia->link_anh = '/storage/app/public/media/profile_khcn/default.jpg';
           
       }
   
     
  $chuyen_gia->save();
        
        
        
        
        $id = $chuyen_gia->id;
        //delete index elastic
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'ntbic_index',
            'type' => 'chuyen_gia_khcn',
            'id' => $id
        ];

        // Delete doc at /my_index/my_type/my_id
        $client->delete($params);
        //re add other index to elastic
        $data = chuyen_gia_khcn::find($id);
        $data->addToIndex();
        
       return Redirect::back()->with('status','Sửa thành công chuyên gia!');
    }
}
