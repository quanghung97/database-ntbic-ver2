<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use File;
use Elasticsearch\ClientBuilder;


class Helper{
     public static function format_message($message,$type)
    {
         return '<p class="alert alert-'.$type.'">'.$message.'</p>';
    }
}
class EditController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $linh_vuc = linh_vuc_san_pham::all();
        
        $data = DB::table('san_pham')->select('ten_san_pham','linh_vuc','dac_diem_noi_bat','mo_ta_chung','quy_trinh_chuyen_giao','kha_nang_ung_dung','anh_san_pham','link','id')->where('id',$id)->first();
        
    	return view('database_manager.san_pham.edit')->with(['datas'=>$data,'linh_vuc'=>$linh_vuc]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->id;
        $entry = san_pham::find($id);
        
        $entry->ten_san_pham = $request->ten_san_pham;
        $entry->linh_vuc = $request->linh_vuc;
        $entry->dac_diem_noi_bat = $request->dac_diem_noi_bat;
        $entry->mo_ta_chung = $request->mo_ta_chung;
        $entry->quy_trinh_chuyen_giao = $request->quy_trinh_chuyen_giao;
        $entry->kha_nang_ung_dung = $request->kha_nang_ung_dung;
        $entry->save();
        
       
      
        $link = $this->text_to_link($entry->id.'-'.$entry->ten_san_pham);
          $entry->link = substr($link,0,45);
          $entry->save();
       

        
         if($request->hasFile('logo')) {
               $logo = $request->file('logo');
             
               $logo_name = $entry->link.'.'.$logo->getClientOriginalExtension();
               $entry->anh_san_pham = '/storage/app/public/media/spkhcn/'.$logo_name;
               $logo->move('storage/app/public/media/spkhcn/', $logo_name);
          } 
          $entry->save();
        
       if($request->delete_logo == 'delete' && $entry->anh_san_pham != '/storage/app/public/media/spkhcn/default.jpg'){
           $str = substr($entry->anh_san_pham, 1);
              File::delete($str);
           $entry->anh_san_pham = '/storage/app/public/media/spkhcn/default.jpg';
           
       }
        
        
         
        //delete index elastic
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'ntbic_index',
            'type' => 'san_pham',
            'id' => $id
        ];

        // Delete doc at /my_index/my_type/my_id
        $client->delete($params);
        //re add other index to elastic
        $data = san_pham::find($id);
        $data->addToIndex();
        
        
        
         $entry->save();
        return Redirect::back()->with('status', 'Sửa thành công một sản phẩm!');
    }
function text_to_link($string){
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
