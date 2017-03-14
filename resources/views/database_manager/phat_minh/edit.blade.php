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
        <form id="form_iconic_validation" action="#">
                      <div class="form-group">
                        <label class="form-label">Tên chuyên gia</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="form1Name" id="form1Name" class="form-control" placeholder="Phạm Ngọc Minh">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Học vị</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="form1Email" id="form1Email" class="form-control" placeholder="Phó giáo sư tiến sĩ">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Năm sinh</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="form1Url" id="form1Url" class="form-control" placeholder="12/11/1958"> 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Chuyên ngành</label>
            <div class="input-with-icon  right">                                       
              <i class=""></i>
               <select name="gendericonic" id="gendericonic" class="select2 form-control"  >
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Cơ quan</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="form1Url" id="form1Url" class="form-control" placeholder="Đại học quốc gia hà nội">                                 
            </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Hướng nghiên cứu</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="form1Url" id="form1Url" class="form-control" placeholder="công nghệ bảo vệ môi trường">                                 
            </div>
          </div>
            <div class="form-group">
              <label class="form-label">Số công trình đã báo cáo</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="form1Url" id="form1Url" class="form-control" placeholder="2">                                 
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Tỉnh thành</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="form1Url" id="form1Url" class="form-control" placeholder="Hà Nội">                                 
            </div>
          </div> 
          <div class=" form-group">
            <span class="form-label">Chọn file ảnh upload</span>
                <input name="file" type="file" multiple />
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