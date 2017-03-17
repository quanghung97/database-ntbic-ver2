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
<div class="form-group">
@if (session('status'))
    <div class="alert alert-success auto_disable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ session('status') }}
    </div>
@endif
  <h4 class="form-title">SỬA DỮ LIỆU SẢN PHẨM </h4>
    <div class="grid simple">
        <form id="form_iconic_validation" action="{{route('sua-san-pham')}}" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <input type="hidden" name="id" value="{{ $datas->id }}">
                      <div class="form-group">
                        <label class="form-label">Tên sản phẩm</label>
                      <span class="error"> (*)&nbsp;&nbsp;{{$errors->first('ten_san_pham')}}</span>  
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="ten_san_pham" id="form1Name" class="form-control" value="{{$datas->ten_san_pham}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Lĩnh vực</label>
                        <span class="error">{{$errors->first('linh_vuc')}}</span>
            <div class="input-with-icon  right">                                       
              <i class=""></i>
               <select name="linh_vuc" id="gendericonic" class="select2 form-control">
                          @foreach($linh_vuc as $item)
                          	@if($item->id == $datas->linh_vuc)
                          		<option value="{{$item->id}}" selected="selected">{{$item->linh_vuc}}</option>
                          	@else
                          		<option value="{{$item->id}}">{{$item->linh_vuc}}</option>
                          	@endif
                          @endforeach
                        </select>
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Đặc điểm nổi bật</label>
                        <span class="error"> (*)&nbsp;&nbsp;{{$errors->first('dac_diem_noi_bat')}}</span>
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="dac_diem_noi_bat" id="form1Url" class="form-control" value="{{$datas->dac_diem_noi_bat}}"> 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mô tả chung</label>
                        <span class="error"> (*)&nbsp;&nbsp;{{$errors->first('mo_ta_chung')}}</span>
           <textarea name="mo_ta_chung" id="" >{{$datas->mo_ta_chung}}</textarea>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Quy trình chuyển giao</label>
                        <span class="error">&nbsp;&nbsp;{{$errors->first('quy_trinh_chuyen_giao')}}</span>
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="quy_trinh_chuyen_giao" id="form1Url" class="form-control" value="{{$datas->quy_trinh_chuyen_giao}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Khả năng ứng dụng</label>
                        <span class="error">&nbsp;&nbsp;{{$errors->first('kha_nang_ung_dung')}}</span>
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="kha_nang_ung_dung" id="form1Url" class="form-control" value="{{$datas->kha_nang_ung_dung}}">                                 
            </div>
          </div>
          
           <div class="form-group">
            <span class="form-label">Chọn file ảnh upload</span>
             
                <input type="file" name="logo" multiple />
          </div>  
          <div class="form-actions">  
          <div class="pull-right">
            <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Lưu</button>
            <a href="{{route('san_pham')}}" class="btn btn-danger btn-cons">Thoát</a>
          </div>
          </div>
        </form>
      </div>
</div>
@endsection

@section('script')
<script src="/webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/public/js/admin/admin_database_manager.js" type="text/javascript"></script>
@endsection