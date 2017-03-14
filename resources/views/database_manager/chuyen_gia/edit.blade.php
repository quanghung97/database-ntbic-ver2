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
  <h4 class="form-title">SỬA DỮ LIỆU CHUYÊN GIA</h4>
  
    <div class="grid simple">
        <form id="form_iconic_validation" action="{{URL::asset('quan-tri-vien/quan-ly-du-lieu/chuyen-gia/sua/'.$chuyen_gia->id)}}" method="post">
          {{csrf_field()}}
                      <div class="form-group">
                        <label class="form-label">Tên chuyên gia</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="ten" id="form1Name" class="form-control" value="{{$chuyen_gia->ho_va_ten}}">
              {!!$errors->first('ten')!!}                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Học vị</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="hoc_vi" id="form1Email" class="form-control" value="{{$chuyen_gia->hoc_vi}}">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Năm sinh</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="nam_sinh" id="form1Url" class="form-control" value="{{$chuyen_gia->nam_sinh}}">
              {!!$errors->first('nam_sinh')!!} 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Chuyên ngành</label>
            <div class="input-with-icon  right">   <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="chuyen_nganh" id="form1Url" class="form-control" value="{{$chuyen_gia->chuyen_nganh}}"> 
            </div>                                    
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
                        <label class="form-label">Tỉnh thành</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="tinh_thanh" id="form1Url" class="form-control" value="{{$chuyen_gia->tinh_thanh}}">                                 
            </div>
                      </div> 
            <div class="form-group">
        <span class="form-label">Chọn file ảnh upload</span>
            <input name="file-anh" type="file" multiple />
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