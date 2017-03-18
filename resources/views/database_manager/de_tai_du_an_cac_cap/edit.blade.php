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
  <h4 class="form-title">SỬA DỮ LIỆU ĐỀ TÀI DỰ ÁN CÁC CẤP</h4>
  
    <div class="grid simple">
        <form id="form_iconic_validation" method="POST" enctype="multipart/form-data">
        
            <div class="form-group">
              <label class="form-label">Tên đề tài</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('ten_de_tai')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ten_de_tai" id="form1Name" class="form-control" value="{{$data->ten_de_tai}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Mã số - Ký hiệu</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('maso_kyhieu')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="maso_kyhieu" id="form1Name" class="form-control" value="{{$data->maso_kyhieu}}">                                 
              </div>
            </div>         
            <div class="form-group">
              <label class="form-label">Lĩnh vực</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="linh_vuc" id="form1Name" class="form-control" value="{{$data->linh_vuc}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Chuyên ngành</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <select  name="chuyen_nganh_khcn" id="form1Url" class="form-control">
              @foreach($datas as $row)
               @if ($data->chuyen_nganh_khcn == $row->id)
                  <option value="{{$row->id}}" selected>{{$row->ten}}</option>
              @endif
                <option value="{{$row->id}}">{{$row->ten}}</option>
              @endforeach
              </select>                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Năm bắt đầu</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="nam_bat_dau" id="form1Name" class="form-control" value="{{$data->nam_bat_dau}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Năm kết thúc</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="nam_ket_thuc" id="form1Name" class="form-control" value="{{$data->nam_ket_thuc}}">                                 
              </div>
            </div>          
            <div class="form-group">
              <label class="form-label">Cơ quan</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="co_quan" id="form1Name" class="form-control" value="{{$data->co_quan}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Chủ nhiệm đề tài</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('chu_nhiem_detai')}}</span>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="chu_nhiem_detai" id="form1Name" class="form-control" value="{{$data->chu_nhiem_detai}}">                                 
              </div>
            </div>
           <div class="form-group">
            <label class="form-label">Điểm nổi bật</label>
                        
            <div class="input-with-icon  right">                                       
              <i class=""></i>
              <input type="text" name="diem_noi_bat" id="form1Url" class="form-control" value="{{$data->diem_noi_bat}}">                                 
            </div>
          </div> 
            <div class="form-group">
            <label class="form-label">Mô tả chung</label>
                        
            <div>                                       
              <i class=""></i>
              <textarea  id="textEditer" name="mota_chung">{{$data->mota_chung}}</textarea>                                   
            </div>
          </div> 
          <div class="form-group">
            <label class="form-label">Mô tả quy trình chuyển giao</label>
                        
            <div>                                       
              <i class=""></i>
              <textarea  id="textEditer" name="mota_quytrinh_chuyengiao">{{$data->mota_quytrinh_chuyengiao}}</textarea>                                   
            </div>
          </div> 
          
          <div class="form-group">
            <label class="form-label">Kết quả thực hiện</label>
                        
            <div>                                       
              <i class=""></i>
              <textarea  id="textEditer" name="ket_qua_thuc_hien_ung_dung">{{$data->ket_qua_thuc_hien_ung_dung}}</textarea>                                   
            </div>
          </div> 
          <div class="form-actions">  
          <div class="pull-right">
            <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Lưu</button>
            <a href="{{route('de_tai_du_an_cac_cap')}}" class="btn btn-danger btn-cons">Thoát</a>
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
@endsection