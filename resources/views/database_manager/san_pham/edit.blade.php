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
  <h4 class="form-title">SỬA DỮ LIỆU SẢN PHẨM </h4>
  @if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    <div class="grid simple">
        <form id="form_iconic_validation" action="{{route('sua-san-pham')}}" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <input type="hidden" name="id" value="{{ $datas->id }}">
                      <div class="form-group">
                        <label class="form-label">Tên sản phẩm</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="ten_san_pham" id="form1Name" class="form-control" value="{{$datas->ten_san_pham}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Lĩnh vực</label>
                        
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
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="dac_diem_noi_bat" id="form1Url" class="form-control" value="{{$datas->dac_diem_noi_bat}}"> 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mô tả chung</label>
           <textarea name="mo_ta_chung" id="" >{{$datas->mo_ta_chung}}</textarea>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Quy trình chuyển giao</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="quy_trinh_chuyen_giao" id="form1Url" class="form-control" value="{{$datas->quy_trinh_chuyen_giao}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Khả năng ứng dụng</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="kha_nang_ung_dung" id="form1Url" class="form-control" value="{{$datas->kha_nang_ung_dung}}">                                 
            </div>
          </div>
          
           <div class="form-group">
            <span class="form-label">Chọn file ảnh upload</span>
             
                <input type="file" name="logo">
          </div>  
          <div class="form-actions">  
          <div class="pull-right">
            <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Save</button>
            <button type="button" class="btn btn-white btn-cons">Cancel</button>
          </div>
          </div>
        </form>
      </div>
</div>
@endsection

@section('script')
@endsection