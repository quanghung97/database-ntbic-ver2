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
  
    <div class="grid simple">
        <form id="form_iconic_validation" action="{{route('sua-san-pham')}}" method="post">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <input type="hidden" name="id" value="{{ $datas->id }}">
                      <div class="form-group">
                        <label class="form-label">Tên sản phẩm</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="ten_san_pham" id="form1Name" class="form-control" placeholder="{{$datas->ten_san_pham}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Lĩnh vực</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
               <select name="linh_vuc" id="gendericonic" class="select2 form-control"  >
                         <option value="1">Công nghệ thông tin và truyền thông</option>
                          <option value="2">Công nghệ sinh học</option>
                          <option value="3">Công nghệ vật liệu mới</option>
                          <option value="4">Công nghệ chế tạo máy - tự động ...</option>
                          <option value="5">Công nghệ môi trường</option>
                          <option value="6">Công nghệ năng lượng mới</option>
                          <option value="7">Công nghệ vũ trụ</option>
                          <option value="8">Công nghệ khác</option>
                        </select>
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Đặc điểm nổi bật</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="dac_diem_noi_bat" id="form1Url" class="form-control" placeholder="{{$datas->dac_diem_noi_bat}}"> 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mô tả chung</label>
            <div class="input-with-icon  right">                                       
               <i class=""></i>
              <input type="text" name="mo_ta_chung" id="form1Url" class="form-control" placeholder="{{$datas->mo_ta_chung}}"> 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Quy trình chuyển giao</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="quy_trinh_chuyen_giao" id="form1Url" class="form-control" placeholder="{{$datas->quy_trinh_chuyen_giao}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Khả năng ứng dụng</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="kha_nang_ung_dung" id="form1Url" class="form-control" placeholder="{{$datas->kha_nang_ung_dung}}">                                 
            </div>
          </div>
           <div class="form-group">
                        <label class="form-label">LinkURL</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="link" id="form1Url" class="form-control" placeholder="{{$datas->link}}">                                 
            </div>
          </div>
           <div class=" form-group">
            <span class="form-label">Chọn file ảnh upload</span>
                <input name="anh_san_pham" type="file" multiple />
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