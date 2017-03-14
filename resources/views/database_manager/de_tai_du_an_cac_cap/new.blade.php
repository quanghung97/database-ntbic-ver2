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
	<h4 class="form-title">THÊM ĐỀ TÀI DỰ ÁN CÁC CẤP</h4>
	
		<div class="grid simple">
				<form id="form_iconic_validation" method="POST" enctype="multipart/form-data">
					
                      <div class="form-group">
                      <label class="form-label">Tên đề tài</label> <span class="error">(*)</span>
                        <p class="error">{{$errors->first('ten_de_tai')}}</p>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ten_de_tai" id="form1Name" class="form-control" value="{{old('ten_de_tai')}}" placeholder="Tên đề tài">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mã số - Kí kiệu</label><span class="error">(*)</span>
                        <p class="error">{{$errors->first('maso_kyhieu')}}</p>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="maso_kyhieu" id="form1Email" class="form-control" value="{{old('maso_kyhieu')}}" placeholder="Mã số - Ký hiệu">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Lĩnh vực</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="linh_vuc" id="form1Url" class="form-control" value="{{old('linh_vuc')}}" placeholder="Lĩnh vực"> 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Chuyên ngành</label><span class="error">(*)</span>
                        <p class="error">{{$errors->first('chuyen_nganh_khcn')}}</p>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="chuyen_nganh_khcn" id="form1Url" class="form-control" value="{{old('chuyen_nganh_khcn')}}" placeholder="Chuyên ngành">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Năm bắt đầu</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="nam_bat_dau" id="form1Url" class="form-control" value="{{old('nam_bat_dau')}}" placeholder="Năm bắt đầu">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Năm kết thúc</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="nam_ket_thuc" id="form1Url" class="form-control" value="{{old('nam_ket_thuc')}}" placeholder="Năm kết thúc">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Cơ quan</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="co_quan" id="form1Url" class="form-control" value="{{old('co_quan')}}" placeholder="Cơ quan">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Chủ nhiệm đề tài</label><span class="error">(*)</span>
                        <p class="error">{{$errors->first('chu_nhiem_detai')}}</p>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="chu_nhiem_detai" id="form1Url" class="form-control" value="{{old('chu_nhiem_detai')}}" placeholder="Chủ nhiệm đề tài">                                 
						</div>
                      </div> 
                      <div class="form-group">
                        <label class="form-label">Điểm nổi bật</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="diem_noi_bat" id="form1Url" class="form-control" value="{{old('diem_noi_bat')}}" placeholder="Điểm nổi bật">                                 
						</div>
                      </div> 
                      <div class="form-group">
                        <label class="form-label">Mô tả chung</label>
                        
						<div >                                       
							<i class=""></i>
							<textarea id="textEditer" name="mota_chung"></textarea>                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mô tả quy trình chuyển giao</label>
                        
						<div>                                       
							<i class=""></i>
							<textarea id="textEditer" name="mota_quytrinh_chuyengiao"></textarea>                                  
						</div>
                      </div> 
                      <div class="form-group">
                        <label class="form-label">Kết quả thực hiện</label>
                        
						<div>                                       
							<i class=""></i>
							<textarea id="textEditer" name="ket_qua_thuc_hien_ung_dung"></textarea>                                   
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