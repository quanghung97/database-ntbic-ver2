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
thêm liệu phát minh
@endsection
@section('main')
@if (session('status'))
<div class="alert alert-success auto_disable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
  {{ session('status') }}
</div>
@endif
<ul class="nav nav-tabs" id="tab-01">
  <li class="active"><a href="#tab1hellowWorld">Thêm thủ công</a></li>
  <li><a href="#tab1FollowUs">Thêm bằng excel</a></li>
</ul>
<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
<div class="tab-content">
  <div class="tab-pane" id="tab1FollowUs">
    <div class="row column-seperation">
      <div class="col-md-12">
        <form id="upload_excel_invention" class="form-group" method="post" enctype="multipart/form-data">
          <input id="excel_import_new_invention" type="file" name="excel_import">
          <input id="excel_import_token" name="_token" value="{{csrf_token()}}" hidden>
        </form>
        <div id="show_item_excel">
          <table class="table table-bordered">
            <thead id="thead_import_invention">
              
            </thead>
            <tbody id="tbody_excel_record">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane active" id="tab1hellowWorld" >
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class="grid-title no-border">
            <h4><span  class="semi-bold">Thêm phát minh</span></h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
          </div>
          <div class="grid-body">
            <div class="form-group">
              <div class="grid simple">
                <form id="form_iconic_validation" action="{{route('them_phat_minh')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                 <div class="form-group">
              <label class="form-label">Tên phát minh</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('ten')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ten" id="form1Name" class="form-control" value="{{old('ten')}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Số bằng - Ký hiệu</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('sobang_kyhieu')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="sobang_kyhieu" id="form1Name" class="form-control" value="{{old('sobang_kyhieu')}}">                                 
              </div>
            </div>      
            <div class="form-group">
              <label class="form-label">Ngày công bố</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('ngay_cong_bo')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ngay_cong_bo" id="form1Name" class="form-control" value="{{old('ngay_cong_bo')}}">                                 
              </div>
            </div>    
            <div class="form-group">
              <label class="form-label">Ngày cấp</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('ngay_cap')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ngay_cap" id="form1Name" class="form-control" value="{{old('ngay_cap')}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Chủ sở hữu chính</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('chu_so_huu_chinh')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="chu_so_huu_chinh" id="form1Name" class="form-control" value="{{old('chu_so_huu_chinh')}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Tác giả</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('tac_gia')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="tac_gia" id="form1Name" class="form-control" value="{{old('tac_gia')}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Điểm nổi bật</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <textarea id="textEditer" name="diem_noi_bat">{{old('diem_noi_bat')}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Mô tả sáng chế phát minh và giải pháp</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
               <textarea id="textEditer" name="mota_sangche_phatminh_giaiphap">{{old('mota_sangche_phatminh_giaiphap')}}</textarea>                                
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Nội dung có thể chuyển giao</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <textarea id="textEditer" name="noidung_cothe_chuyengiao">{{old('noidung_cothe_chuyengiao')}}</textarea>                               
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Thị trường và ứng dụng</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <textarea id="textEditer" name="thitruong_ungdung">{{old('thitruong_ungdung')}}</textarea>                                
              </div>
            </div>          
           <div class="form-group">
              <label class="form-label">Lĩnh vực khoa học công nghệ</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('linh_vuc_khcn')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <select name="linh_vuc_khcn" id="form1Url" class="form-control">
                   @foreach($linh_vuc_khcn as $row)
                      <option value="{{$row->id}}" selected>{{$row->linh_vuc}}</option>
                    @endforeach
               </select>                                   
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Loại phát minh sáng chê</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('loai_phat_minh_sang_che')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <select name="loai_phat_minh_sang_che" id="form1Url" class="form-control">
                   @foreach($loai_phat_minh_sang_che as $row)
                      <option value="{{$row->id}}" selected>{{$row->loai_phat_minh_sang_che}}</option>
                    @endforeach
               </select>                               
              </div>
            </div>  
                <div class="form-group">
                  <span class="form-label">Hình ảnh minh họa</span>
                  <span class="error">&nbsp;&nbsp;{{$errors->first('file-anh')}}</span>
                  <input name="file-anh" type="file" multiple />
                </div>
                <div class="form-actions">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i>Lưu</button>
                    <a href="{{route('phat_minh')}}" class="btn btn-danger btn-cons">Thoát</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<script src="/webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/public/js/admin/admin_database_manager.js" type="text/javascript"></script>
<script src="{{URL::asset('/public/js/excel.js')}}" type="text/javascript"></script>
<script src="/public/js/admin/them_phat_minh_excel.js" type="text/javascript"></script>
<script type="text/javascript">
  $(".sub-menu").css('display','block');
  $("#sub_menu_quan_ly_database").addClass("active");
  $("#active_phat_minh").addClass("active");
</script>
@endsection