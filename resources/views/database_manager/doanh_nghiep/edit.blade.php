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
  <h4 class="form-title">SỬA DỮ LIỆU DOANH NGHIỆP</h4>
		<div class="grid simple">
				<form id="form_iconic_validation" action="#" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
					<h4 class="form-label">I. Thông tin chung </h4>
                      <div class="form-group">
                        <label class="form-label">Tên doanh nghiệp</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('name')}}</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="name" id="name" class="form-control" value="{{$doanh_nghiep->ten_doanh_nghiep}}">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Trụ sở</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('dia_Chi')}}</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="dia_chi" id="dia_chi" class="form-control" value="{{$doanh_nghiep->dia_chi}}"> 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Lĩnh vực KH&CN</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<select name="linh_vuc" id="linh_vuc" class="select2 form-control"  >
                          @foreach($linh_vuc as $item)
                          	@if($item->id == $doanh_nghiep->linh_vuc)
                          		<option value="{{$item->id}}" selected="selected">{{$item->linh_vuc}}</option>
                          	@else
                          		<option value="{{$item->id}}">{{$item->linh_vuc}}</option>
                          	@endif
                          @endforeach
                        </select>
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Tỉnh/thành phố</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<select name="tinh_thanh_pho" id="tinh_thanh_pho" class="select2 form-control"  >
                           @foreach($tinh_thanh as $item)
                           @if($item->id == $doanh_nghiep->tinh_thanh_pho)
                          		<option value="{{$item->id}}" selected="selected">{{$item->tinh_thanh_pho}}</option>
                          	@else
                          		<option value="{{$item->id}}">{{$item->tinh_thanh_pho}}</option>
                          	@endif
                          
                          @endforeach
                        </select>
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Ngành nghề kinh doanh chính</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="nganh_nghe_kinh_doanh" id="nganh_nghe_kinh_doanh" class="form-control" value="{{$doanh_nghiep->nganh_nghe_kinh_doanh}}"> 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('email')}}</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="email" id="email" class="form-control" value="{{$doanh_nghiep->email}}">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Phone</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="phone" id="phone" class="form-control" value="{{$doanh_nghiep->phone}}">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Fax</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="fax" id="fax" class="form-control" value="{{$doanh_nghiep->fax}}">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Website</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="website" id="website" class="form-control" value="{{$doanh_nghiep->website}}">                                 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Mã số thuế</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ma_so_thue" id="ma_so_thue" class="form-control" value="{{$doanh_nghiep->ma_so_thue}}"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Loại hình</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="loai_hinh" id="loai_hinh" class="form-control" value="{{$doanh_nghiep->loai_hinh}}"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Ngày đăng kí thành lập</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ngay_dang_ki" id="ngay_dang_ki" class="form-control" value="{{$doanh_nghiep->ngay_dang_ky}}"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Tên người đại diện theo pháp luật</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('ten_dai_dien')}}</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ten_dai_dien" id="ten_dai_dien" class="form-control" value="{{$doanh_nghiep->ten_dai_dien}}"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Số điện thoại người đại diện</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="sdt_dai_dien" id="sdt_dai_dien" class="form-control" value="{{$doanh_nghiep->phone_dai_dien}}"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Email người đại diện</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('email_dai_dien')}}</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="email_dai_dien" id="email_dai_dien" class="form-control" value="{{$doanh_nghiep->email_dai_dien}}"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Địa chỉ người đại diện</label>
                        <span class="error">(*)&nbsp;&nbsp;{{$errors->first('dia_chi_dai_dien')}}</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="dia_chi_dai_dien" id="dia_chi_dai_dien" class="form-control" value="{{$doanh_nghiep->dia_chi_dai_dien}}"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Văn phòng đại diện </label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="van_phong_dai_dien" id="van_phong_dai_dien" class="form-control" value="{{$doanh_nghiep->van_phong_dai_dien}}"> 
						</div>
                      </div>
           	<h4 class = "form-label"> II. Thông tin về KH&CN </h4>

           	<div class="form-group">
                        <label class="form-label">Số quyết định</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="so_quyet_dinh" id="so_quyet_dinh" class="form-control" value="{{$doanh_nghiep->so_quyet_dinh_khcn}}"> 
						</div>
                      </div>
            <div class="form-group">
                        <label class="form-label">Thời gian đăng ký</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="thoi_gian_dang_ky_khcn" id="thoi_gian_dang_ky_khcn" class="form-control" value="{{$doanh_nghiep->thoi_gian_dang_ky_khcn}}"> 
						</div>
                      </div>

            <div class="form-group">
                        <label class="form-label">Nơi cấp</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="noi_cap" id="noi_cap" class="form-control" value="{{$doanh_nghiep->noi_cap_chung_nhan_khcn}}"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Xếp hạng trình độ khoa học công nghệ</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="xep_hang_trinh_do" id="xep_hang_trinh_do" class="form-control" value="{{$doanh_nghiep->xep_hang_trinh_do_khcn}}"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Hướng nghiên cứu KH&CN</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="huong_nghien_cuu_khcn" id="huong_nghien_cuu_khcn" class="form-control" value="{{$doanh_nghiep->huong_nghien_cuu_khcn}}"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Số lượng cán bộ nghiên cứu khoa học</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="so_luong_can_bo" id="so_luong_can_bo" class="form-control" value="{{$doanh_nghiep->so_luong_can_bo_khcn}}"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Công nghệ nổi bật</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="cong_nghe_noi_bat" id="cong_nghe_noi_bat" class="form-control" value="{{$doanh_nghiep->cong_nghe_noi_bat}}"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Sử dụng công nghệ</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="su_dung_cong_nghe" id="su_dung_cong_nghe" class="form-control" value="{{$doanh_nghiep->su_dung_cong_nghe}}"> 
						</div>
                      </div>
            
            <div class="form-group">
            	<img  style="max-height: 150px; max-width: auto" src="{{$doanh_nghiep->logo}}"/><br><br>
				<span class="form-label">Thay đổi logo doanh nghiệp</span>
				<span class="error">&nbsp;&nbsp;{{$errors->first('logo')}}</span>
		        <ul class="nav nav-tabs">
                        <li><a href="#home" data-toggle="tab">Thay đổi ảnh</a></li>
                        <li><a href="#info" data-toggle="tab">Xóa ảnh(trả về ảnh mặc định)</a></li>
                        
                    </ul>
 
                    <div class="tab-content">
                        <div class="tab-pane" id="home"><input type="file" name="logo" multiple /></div>
                        <div class="tab-pane" id="info">
                            <button type="button" class="btn btn-danger btn-cons" id="delete_logo">Xóa ảnh</button>
                            
                        </div>
                        
                    </div>
		    </div> 

          <div class="form-actions">  
	          <div class="pull-right">
	            <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Lưu</button>
	            <a href="{{route('doanh_nghiep')}}" class="btn btn-danger btn-cons">Thoát</a>
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
  $("#active_doanh_nghiep").addClass("active");
    
      $(document).ready(function(){
    $("#delete_logo").click(function(){
        var d1 = document.getElementById('info');
        d1.insertAdjacentHTML('afterend', '<div class="alert alert-warning auto_disable"> <h3>Nhấn Lưu để xóa ảnh</h3> <input type="hidden" name="delete_logo" value="delete"> </div>');
        $("#delete_logo").remove();

    });
    
});
</script>
@endsection