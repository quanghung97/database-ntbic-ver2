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
@section('name_page')
sửa dữ liệu chuyên gia
@endsection
@section('main')
  @if (session('status'))
      <div class="alert alert-success auto_disable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
          {{ session('status') }}
      </div>
  @endif
<div class="form-group">
  <h4 class="form-title">SỬA DỮ LIỆU CHUYÊN GIA</h4>
    <div class="grid simple">
        <form id="form_iconic_validation" action="{{URL::asset('admin/quan-ly-du-lieu/chuyen-gia/sua/'.$chuyen_gia->id)}}" method="post"  enctype="multipart/form-data">
          {{csrf_field()}}
                      <div class="form-group">
                        <label class="form-label">Tên chuyên gia</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('ten')}}</span>
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="ten" id="form1Name" class="form-control" value="{{$chuyen_gia->ho_va_ten}}">                              
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Học vị</label>
                        <div class="input-with-icon  right">                                       
                          <i class=""></i>
                          <select name="hoc_vi" id="hoc_vi" class="select2 form-control"  >
                                       @foreach($hoc_vi as $item)
                                       @if($chuyen_gia->hoc_vi == $item->hoc_vi)
                                         <option value="{{$item->hoc_vi}}" selected>{{$item->hoc_vi}}</option>
                                         @else
                                         <option value="{{$item->hoc_vi}}">{{$item->hoc_vi}}</option>
                                         @endif
                                      @endforeach
                                    </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Ngày sinh</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('ngay_sinh')}}</span>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="nam_sinh" id="form1Url" class="form-control" value="{{$chuyen_gia->nam_sinh}}">
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Chuyên ngành</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('chuyen_nganh')}}</span>
                        <div class="input-with-icon  right">                                       
                          <i class=""></i>
                          <input type="text" name="chuyen_nganh" id="form1Url" class="form-control" value="{{$chuyen_gia->chuyen_nganh}}">                                     
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Cơ quan</label>
                        
                        <div class="input-with-icon  right">                                       
                          <i class=""></i>
                          <input type="text" name="co_quan" id="form1Url" class="form-control" value="{{$chuyen_gia->co_quan}}">                                 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Địa chỉ cơ quan</label>
                        
                        <div class="input-with-icon  right">                                       
                          <i class=""></i>
                          <input type="text" name="dia_chi_co_quan" id="form1Url" class="form-control" value="{{$chuyen_gia->dia_chi_co_quan}}">                                 
                        </div>
                      </div>

            <div class="form-group">
                        <label class="form-label">Hướng nghiên cứu</label>
                        
            <div>                                       
              <i class=""></i>
              <textarea  id="textEditer" name="huong_nghien_cuu">{{$chuyen_gia->huong_nghien_cuu}}</textarea>                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Số công trình đã báo cáo</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="so_cong_trinh" id="form1Url" class="form-control" value="{{$chuyen_gia->Sl_congTrinh_baiBao}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Tỉnh/thành phố</label>
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <select name="tinh_thanh_pho" id="tinh_thanh_pho" class="select2 form-control"  >
                           @foreach($tinh_thanh as $item)
                           
                           @if($chuyen_gia->tinh_thanh == $item->tinh_thanh_pho)
                           <option value="{{$item->tinh_thanh_pho}}" selected>{{$item->tinh_thanh_pho}}</option>
                           @else
                           <option value="{{$item->tinh_thanh_pho}}">{{$item->tinh_thanh_pho}}</option>
                           @endif
                          @endforeach
                        </select>
            </div>
                      </div>
            <div class="form-group">
              <img class="responsive-img anh_cu" src="{{ URL::asset($chuyen_gia->link_anh) }}" alt="ảnh" class="img-circle anh_chuyen_gia">
            <br>
        <span class="form-label">Thay đổi ảnh chuyên gia</span>
        <span class="error">&nbsp;&nbsp;{{$errors->first('file-anh')}}</span>
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
            <a href="{{route('chuyen_gia')}}" class="btn btn-danger btn-cons">Thoát</a>
          </div>
          </div>
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
  $("#active_chuyen_gia").addClass("active");
    
        
   $(document).ready(function(){
    $("#delete_logo").click(function(){
        var d1 = document.getElementById('info');
        d1.insertAdjacentHTML('afterend', '<div class="alert alert-warning auto_disable"> <h3>Nhấn Lưu để xóa ảnh</h3> <input type="hidden" name="delete_logo" value="delete"> </div>');
        $("#delete_logo").remove();

    });
    
});
</script>
@endsection