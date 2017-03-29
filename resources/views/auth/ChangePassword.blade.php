@extends('admin.home')
@section('is_active_userpage')
active
@endsection
@section('css')
<link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="{{ URL::asset('webarch/webarch/HTML/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/css/custom-icon-set.css') }}" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/admin_chuyen_gia.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/admin_user_manager.css') }}">
@endsection
@section('main')
<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Thông tin cung cấp để đổi mật khẩu</h4>
				
				<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
			</div>
			<div class="grid-body no-border">
				<form method="post" novalidate="novalidate">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								
								<label class="semi-bold">Nhập mật khẩu cũ </label>
								<p class="text-error">
									{{$errors->first('old_password')}}
								</p>
								<input type="password" class="form-control" name="old_password">
							</div>
							<div class="form-group">
								<label class="semi-bold">Nhập mật khẩu mới </label>
								<p class="text-error">
									{{$errors->first('new_password')}}
								</p>
								<input type="password" class="form-control" name="new_password">
							</div>
							<div class="form-group">
								<label class="semi-bold">Nhập lại mật khẩu mới </label>
								<p class="text-error">
									{{$errors->first('re_new_password')}}
								</p>
								
								<input type="password" class="form-control" name="re_new_password">
							</div>
							<input name="_token" value="{{csrf_token()}}" hidden>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-cons">Đổi mật khẩu</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection()
@section('script')
<script type="text/javascript">
$("#active_quan_ly_user").addClass("active");
$(function () {
$("#example").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});
</script>
@endsection