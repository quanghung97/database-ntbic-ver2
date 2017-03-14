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
	<h4 class="form-title">THÊM DOANH NGHIỆP</h4>
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
				<form id="form_iconic_validation" action="#" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
					<h4 class="form-label">I. Thông tin chung </h4>
                      <div class="form-group">
                        <label class="form-label">Tên doanh nghiệp</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="name" id="name" class="form-control">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Trụ sở</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="dia_chi" id="dia_chi" class="form-control"> 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Lĩnh vực KH&CN</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<select name="linh_vuc" id="linh_vuc" class="select2 form-control"  >
                          @foreach($linh_vuc as $item)
                          <option value="{{$item->id}}">{{$item->linh_vuc}}</option>
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
                          <option value="{{$item->id}}">{{$item->tinh_thanh_pho}}</option>
                          @endforeach
                        </select>
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Ngành nghề kinh doanh chính</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="nganh_nghe_kinh_doanh" id="nganh_nghe_kinh_doanh" class="form-control"> 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Email</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="email" id="email" class="form-control">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Phone</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="phone" id="phone" class="form-control">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Fax</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="fax" id="fax" class="form-control">                                 
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Website</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="website" id="website" class="form-control">                                 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Mã số thuế</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ma_so_thue" id="ma_so_thue" class="form-control"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Loại hình</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="loai_hinh" id="loai_hinh" class="form-control"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Ngày đăng kí thành lập</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ngay_dang_ki" id="ngay_dang_ki" class="form-control"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Tên người đại diện theo pháp luật</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ten_dai_dien" id="ten_dai_dien" class="form-control"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Số điện thoại người đại diện</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="sdt_dai_dien" id="sdt_dai_dien" class="form-control"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Email người đại diện</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="email_dai_dien" id="email_dai_dien" class="form-control"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Địa chỉ người đại diện</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="dia_chi_dai_dien" id="dia_chi_dai_dien" class="form-control"> 
						</div>
                      </div>

                <div class="form-group">
                        <label class="form-label">Văn phòng đại diện </label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="van_phong_dai_dien" id="van_phong_dai_dien" class="form-control"> 
						</div>
                      </div>
           	<h4 class = "form-label"> II. Thông tin về KH&CN </h4>

           	<div class="form-group">
                        <label class="form-label">Số quyết định</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="so_quyet_dinh" id="so_quyet_dinh" class="form-control"> 
						</div>
                      </div>
            <div class="form-group">
                        <label class="form-label">Thời gian đăng ký</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="thoi_gian_dang_ky_khcn" id="thoi_gian_dang_ky_khcn" class="form-control"> 
						</div>
                      </div>

            <div class="form-group">
                        <label class="form-label">Nơi cấp</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="noi_cap" id="noi_cap" class="form-control"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Xếp hạng trình độ khoa học công nghệ</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="xep_hang_trinh_do" id="xep_hang_trinh_do" class="form-control"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Hướng nghiên cứu KH&CN</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="huong_nghien_cuu_khcn" id="huong_nghien_cuu_khcn" class="form-control"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Số lượng cán bộ nghiên cứu khoa học</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="so_luong_can_bo" id="so_luong_can_bo" class="form-control"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Công nghệ nổi bật</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="cong_nghe_noi_bat" id="cong_nghe_noi_bat" class="form-control"> 
						</div>
                      </div>
            
            <div class="form-group">
                        <label class="form-label">Sử dụng công nghệ</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="su_dung_cong_nghe" id="su_dung_cong_nghe" class="form-control"> 
						</div>
                      </div>
            
            <div class="form-group">
				<span class="form-label">Logo profile</span>
		        <input type="file" name="logo" multiple>
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