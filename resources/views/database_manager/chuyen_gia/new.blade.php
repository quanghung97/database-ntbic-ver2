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
sửa dữ liệu chuyên gia
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
						<h4><span  class="semi-bold">Thêm Chuyên Gia</span></h4>
						<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
					</div>
					<div class="grid-body">
						<div class="form-group">
							<div class="grid simple">
								<form id="form_iconic_validation" action="{{route('them_chuyen_gia')}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-group">
										<label class="form-label">Tên chuyên gia</label>
										<span class="error">(*)&nbsp;&nbsp;{{$errors->first('ten')}}</span>
										<div class="input-with-icon  right">
											<i class=""></i>
											<input type="text" name="ten" id="form1Name" class="form-control"  value="{{old('ten')}}" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Học vị</label>
										<div class="input-with-icon  right">
											<i class=""></i>
											<select name="hoc_vi" id="hoc_vi" class="select2 form-control"  >
												@foreach($hoc_vi as $item)
												<option value="{{$item->hoc_vi}}">{{$item->hoc_vi}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Ngày sinh</label>
										<span class="error">(*)&nbsp;&nbsp;{{$errors->first('nam_sinh')}}</span>
										<div class="input-with-icon  right">
											<i class=""></i>
											<input type="text" name="nam_sinh" id="form1Url" class="form-control" value="{{old('nam_sinh')}}">
											
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Chuyên ngành</label>
										<span class="error">(*)&nbsp;&nbsp;{{$errors->first('chuyen_nganh')}}</span>
										<div class="input-with-icon  right">   <div class="input-with-icon  right">
											<i class=""></i>
											<input type="text" name="chuyen_nganh" id="form1Url" class="form-control"  value="{{old('chuyen_nganh')}}">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Cơ quan</label>
									
									<div class="input-with-icon  right">
										<i class=""></i>
										<input type="text" name="co_quan" id="form1Url" class="form-control"  value="{{old('co_quan')}}">
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Địa chỉ cơ quan</label>
									
									<div class="input-with-icon  right">
										<i class=""></i>
										<input type="text" name="dia_chi_co_quan" id="form1Url" class="form-control""  value="{{old('dia_chi_co_quan')}}">
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Hướng nghiên cứu</label>
									
									<div >
										<i class=""></i>
										<textarea id="textEditer" name="huong_nghien_cuu">{{old('huong_nghien_cuu')}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Số công trình đã báo cáo</label>
									
									<div class="input-with-icon  right">
										<i class=""></i>
										<input type="text" name="so_cong_trinh" id="form1Url" class="form-control"  value="{{old('so_cong_trinh')}}">
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Tỉnh/thành phố</label>
									<div class="input-with-icon  right">
										<i class=""></i>
										<select name="tinh_thanh_pho" id="tinh_thanh_pho" class="select2 form-control"  >
											@foreach($tinh_thanh as $item)
											<option value="{{$item->tinh_thanh_pho}}">{{$item->tinh_thanh_pho}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<span class="form-label">Chọn file ảnh upload</span>
									<span class="error">&nbsp;&nbsp;{{$errors->first('file-anh')}}</span>
									<input name="file-anh" type="file" multiple />
								</div>
								<div class="form-actions">
									<div class="pull-right">
										<button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i>Lưu</button>
										<a href="{{route('chuyen_gia')}}" class="btn btn-danger btn-cons">Thoát</a>
									</div>
								</div>
							</form>
						</div>
					</div>
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
<script src="/public/js/admin/them_chuyen_gia_excel.js" type="text/javascript"></script>
<script type="text/javascript">
  $(".sub-menu").css('display','block');
  $("#sub_menu_quan_ly_database").addClass("active");
  $("#active_chuyen_gia").addClass("active");
</script>
@endsection