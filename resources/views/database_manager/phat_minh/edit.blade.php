@extends('admin.home')
@section('css')
<link href="/webarch/webarch/HTML/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/webarch/webarch/HTML/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="/webarch/webarch/HTML/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<link rel="stylesheet" type="text/css" href="/public/css/admin_chuyen_gia.css">
@endsection

@section('main')
@if (session('status'))
    <div class="alert alert-success auto_disable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ session('status') }}
    </div>
@endif
<div class="form-group">
  <h4 class="form-title">SỬA DỮ LIỆU BẰNG PHÁT MINH, SÁNG CHẾ</h4>
  
    <div class="grid simple">
        <form id="form_iconic_validation" method="POST" enctype="multipart/form-data">
        
            <div class="form-group">
              <label class="form-label">Tên phát minh</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('ten')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ten" id="form1Name" class="form-control" value="{{$phat_minh->ten}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Số bằng - Ký hiệu</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('sobang_kyhieu')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="sobang_kyhieu" id="form1Name" class="form-control" value="{{$phat_minh->sobang_kyhieu}}">                                 
              </div>
            </div>      
            <div class="form-group">
              <label class="form-label">Ngày công bố</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('ngay_cong_bo')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ngay_cong_bo" id="form1Name" class="form-control" value="{{$phat_minh->ngay_cong_bo}}">                                 
              </div>
            </div>    
            <div class="form-group">
              <label class="form-label">Ngày cấp</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('ngay_cap')}}</p>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ngay_cap" id="form1Name" class="form-control" value="{{$phat_minh->ngay_cap}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Chủ sở hữu chính</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('chu_so_huu_chinh')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="chu_so_huu_chinh" id="form1Name" class="form-control" value="{{$phat_minh->chu_so_huu_chinh}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Tác giả</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('tac_gia')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="tac_gia" id="form1Name" class="form-control" value="{{$phat_minh->tac_gia}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Điểm nổi bật</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <textarea  id="textEditer" name="diem_noi_bat">{{$phat_minh->diem_noi_bat}}</textarea>                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Mô tả sáng chế phát minh và giải pháp</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <textarea  id="textEditer" name="mota_giaiphap_sangche_phatminh">{{$phat_minh->mota_giaiphap_sangche_phatminh}}</textarea>                                
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Nội dung có thể chuyển giao</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="noidung_cothe_chuyengiao" id="form1Name" class="form-control" value="{{$phat_minh->noidung_cothe_chuyengiao}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Thị trường và ứng dụng</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="thitruong_ungdung" id="form1Name" class="form-control" value="{{$phat_minh->thitruong_ungdung}}">                                 
              </div>
            </div>          
            <div class="form-group">
              <label class="form-label">Hình ảnh minh họa</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="hinh_anh_minh_hoa" id="form1Name" class="form-control" value="{{$phat_minh->hinh_anh_minh_hoa}}">                                 
              </div>
            </div>
           <div class="form-group">
              <label class="form-label">Lĩnh vực khoa học công nghệ</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
               <select name="linh_vuc_khcn" id="form1Url" class="form-control">
                   @foreach($linh_vuc_khcn as $row)
                        @if($phat_minh->linh_vuc_khcn == $row->id)
                            <option value="{{$row->id}}" selected>{{$row->linh_vuc}}</option>
                        @endif
                            <option value="{{$row->id}}">{{$row->linh_vuc}}</option>}
                        @endforeach
               </select>                            
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Loại phát minh sáng chê</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <select name="loai_phat_minh_sang_che" id="form1Url" class="form-control">
                   @foreach($loai_phat_minh_sang_che as $row)
                        @if($phat_minh->loai_phat_minh_sang_che == $row->id)
                            <option value="{{$row->id}}" selected>{{$row->loai_phat_minh_sang_che}}</option>
                        @endif
                            <option value="{{$row->id}}">{{$row->loai_phat_minh_sang_che}}</option>}
                        @endforeach
               </select>                            
              </div>
            </div> 
            <div class="form-group">
              <img class="responsive-img anh_cu" src="{{ URL::asset($phat_minh->hinh_anh_minh_hoa) }}" alt="ảnh" class="img-circle anh_chuyen_gia">
              <br>
              <span class="form-label">Thay đổi ảnh phát minh</span>
              <span class="error">&nbsp;&nbsp;{{$errors->first('ten')}}</span>
                  <ul class="nav nav-tabs">
                        <li><a href="#home" data-toggle="tab">Thay đổi ảnh</a></li>
                        <li><a href="#info" data-toggle="tab">Xóa ảnh(trả về ảnh mặc định)</a></li>
                        
                    </ul>
 
                    <div class="tab-content">
                        <div class="tab-pane" id="home"><input type="file" name="file-anh" multiple /></div>
                        <div class="tab-pane" id="info">
                            <button type="button" class="btn btn-danger btn-cons" id="delete_logo">Xóa ảnh</button>
                            
                        </div>
                        
                    </div>
                 
          </div>            
          <div class="form-actions">  
          <div class="pull-right">
            <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Lưu</button>
            <a href="{{route('phat_minh')}}" class="btn btn-danger btn-cons">Thoát</a>
          </div>
          </div>
          <input type="text" name="_token" value="{{CSRF_TOKEN()}}" hidden>
        </form>
      </div>
</div>
@endsection

@section('script')
<script src="/webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/public/js/admin/admin_database_manager.js" type="text/javascript"></script>
<script type="text/javascript">
  $(".sub-menu").css('display','block');
  $("#sub_menu_quan_ly_database").addClass("active");
  $("#active_phat_minh").addClass("active");
     
     $(document).ready(function(){
    $("#delete_logo").click(function(){
        var d1 = document.getElementById('info');
        d1.insertAdjacentHTML('afterend', '<div class="alert alert-warning auto_disable"> <h3>Nhấn Lưu để xóa ảnh</h3> <input type="hidden" name="delete_logo" value="delete"> </div>');
        $("#delete_logo").remove();

    });
    
});
</script>
@endsection
