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
@section('name_page')
sửa dữ liệu đề tài dự án các cấp
@endsection
@section('main')
@if (session('status'))
<div class="alert alert-success auto_disable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	{{ session('status') }}
</div>
@endif
<ul class="nav nav-tabs" id="tab-01">
	<li class="active"><a href="#tab1hellowWorld">Thêm thủ công</a></li>
	<li><a href="#tab1FollowUs">Thêm bằng excel</a></li>
</ul>
<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
<div class="tab-content">
	<div class="tab-pane" id="tab1FollowUs">
		<div class="row column-seperation">
			<div class="col-md-12">
				<form id="upload_excel_record" class="form-group" method="post" enctype="multipart/form-data">
					<input id="excel_import_new_record" type="file" name="excel_import">
					<input id="excel_import_token" name="_token" value="{{csrf_token()}}" hidden>
				</form>
				<div id="show_item_excel">
					<table class="table table-bordered">
						<thead id="thead_import_record">
							
						</thead>
						<tbody id="tbody_excel_record">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane active" id="tab1hellowWorld" >
		<div class="row">
			<div class="col-md-12">
				<div class="grid simple">
					<div class="grid-title no-border">
						<h4><span  class="semi-bold">Thêm Đề Tài Dự Án Các Cấp</span></h4>
						<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
					</div>
					<div class="grid-body">
						<div class="form-group">
							<div class="grid simple">
								<form id="form_iconic_validation" method="POST" enctype="multipart/form-data">
					
                      <div class="form-group">
                      <label class="form-label">Tên đề tài</label> <span class="error">(*)&nbsp;&nbsp;{{$errors->first('ten_de_tai')}}</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ten_de_tai" id="form1Name" class="form-control" value="{{old('ten_de_tai')}}" placeholder="Tên đề tài">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mã số - Kí kiệu</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('maso_kyhieu')}}</span>
                        
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
                        <label class="form-label">Chuyên ngành</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<select  name="chuyen_nganh_khcn" id="form1Url" class="form-control">
							@foreach($datas as $row)
								<option value="{{$row->id}}">{{$row->ten}}</option>
							@endforeach
							</select>				      
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
                        <label class="form-label">Chủ nhiệm đề tài</label><span class="error">(*)&nbsp;&nbsp;{{$errors->first('chu_nhiem_detai')}}</span>
                        
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
					  <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Lưu</button>
					  <a href="{{route('de_tai_du_an_cac_cap')}}" class="btn btn-danger btn-cons">Thoát</a>
					</div>
					</div>
					<input type="text" name="_token" value="{{CSRF_TOKEN()}}" hidden>
				</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="/webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/public/js/admin/admin_database_manager.js" type="text/javascript"></script>
<script src="{{URL::asset('/public/js/excel.js')}}" type="text/javascript"></script>
<script src="/public/js/admin/them_deTaiDuAnCacCap_excel.js" type="text/javascript"></script>
@endsection







