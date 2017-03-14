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
  <h4 class="form-title">SỬA DỮ LIỆU PHÁT MINH</h4>
  
    <div class="grid simple">
        <form id="form_iconic_validation" method="POST" enctype="multipart/form-data">
        
            <div class="form-group">
              <label class="form-label">Tên phát minh</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('ten')}}</p>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="ten" id="form1Name" class="form-control" value="{{$phat_minh->ten}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Số bằng - Ký hiệu</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('sobang_kyhieu')}}</p>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="sobang_kyhieu" id="form1Name" class="form-control" value="{{$phat_minh->sobang_kyhieu}}">                                 
              </div>
            </div>      
            <div class="form-group">
              <label class="form-label">Ngày công bố</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('ngay_cong_bo')}}</p>
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
              <label class="form-label">Chủ sở hữu chính</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('chu_so_huu_chinh')}}</p>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="chu_so_huu_chinh" id="form1Name" class="form-control" value="{{$phat_minh->chu_so_huu_chinh}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Tác giả</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('tac_gia')}}</p>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="tac_gia" id="form1Name" class="form-control" value="{{$phat_minh->tac_gia}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Điểm nổi bật</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="diem_noi_bat" id="form1Name" class="form-control" value="{{$phat_minh->diem_noi_bat}}">                                 
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Mô tả sáng chế phát minh và giải pháp</label>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="mota_sangche_phatminh_giaiphap" id="form1Name" class="form-control" value="{{$phat_minh->mota_sangche_phatminh_giaiphap}}">                                 
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
              <label class="form-label">Lĩnh vực khoa học công nghệ</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('linh_vuc_khcn')}}</p>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="linh_vuc_khcn" id="form1Name" class="form-control" value="{{$phat_minh->linh_vuc_khcn}}">                                 
              </div>
            </div> 
            <div class="form-group">
              <label class="form-label">Loại phát minh sáng chê</label><span class="error">(*)</span>
              <p class="error">{{$errors->first('loai_phat_minh_sang_che')}}</p>
              <div class="input-with-icon  right">                                       
                <i class=""></i>
                <input type="text" name="loai_phat_minh_sang_che" id="form1Name" class="form-control" value="{{$phat_minh->loai_phat_minh_sang_che}}">                                 
              </div>
            </div> 
          <div class="form-actions">  
          <div class="pull-right">
            <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Save</button>
            <button type="button" class="btn btn-white btn-cons">Cancel</button>
          </div>
          </div>
          <input type="text" name="_token" value="{{CSRF_TOKEN()}}" hidden>
        </form>
      </div>
</div>
@endsection

@section('script')
@endsection
