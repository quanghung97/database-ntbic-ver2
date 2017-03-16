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
<style>
thead tr {
	background-color: red
}
</style>
@endsection

@section('main')
<div class="form-group">
	<h4 class="form-title">THÊM NGƯỜI DÙNG</h4>
		
		<div class="grid simple">

				<form id="form_iconic_validation" method="post">
					{{csrf_field()}}
                      <div class="form-group">
                      @if(session('success'))
                      <div class="alert alert-success">
	                  <button class="close" data-dismiss="alert"></button> cập nhật người dùng "{{ old("username") }}" thành công !</div>
	                  @endif
                        <label class="form-label">Tên tài khoản</label>
                        <p class="text-error">{!! $errors->first('username') !!}</p>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="username" id="form1Name" class="form-control" value="{{ $user->username }}">                         
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Quyền</label>
                        <p class="text-error">{!! $errors->first('author') !!} </p>
						<div class="input-with-icon right">                                       
							<i class=""></i>
							<select id="author" name="author" class="select2 form-control">
								<option value="">Lựa chọn</option>
								@if($user->author == 'admin')
	                             	<option value="admin" selected="">Admin (Quản trị viên - quyền cao nhất)</option>
	                            @else
	                            	<option value="admin">Admin (Quản trị viên - quyền cao nhất)</option>
	                            @endif
	                            @if($user->author == 'moderator')
	                            	<option value="moderator" selected="">Moderator (Biên tập viên - Được admin quản lý)</option>
	                            @else
	                            	<option value="moderator">Moderator (Biên tập viên - Được admin quản lý)</option>

	                            @endif
	                          </select>
						</div>
						<div style="margin: 10px 0 0 0" id="more_option">
						<p class="col-md-12 text-info" style="font-weight: bold">Lựa chọn quyền thực thi cho biên tập viên</p>
						<div class="col-md-2">
							<div style="font-weight: bold; text-align: center; background: #ECECEC; padding: 10px 0 10px 0">Chuyên gia KHCN</div>
		                  <table class="table table-bordered no-more-tables">
								<tbody>
									<tr>
                                        <td>
                                          	<div class="checkbox check-default">
                                          		@if(isset($check['chuyen_gia_insert']))
													<input name="chuyen_gia_insert" id="chuyen_gia_insert" type="checkbox" value="1" checked="">
												@else
													<input name="chuyen_gia_insert" id="chuyen_gia_insert" type="checkbox" value="1">
												@endif
												<label for="chuyen_gia_insert"></label>
											</div>
                                        </td>
                                        <td class="text-center">Thêm</td>
                  
                                    </tr>
									<tr>
                                       
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['chuyen_gia_update']))
													<input name="chuyen_gia_update" id="chuyen_gia_update" type="checkbox" value="1" checked="">
												@else
													<input name="chuyen_gia_update" id="chuyen_gia_update" type="checkbox" value="1">
												@endif
												<label for="chuyen_gia_update"></label>
											</div>
                                        </td>
                                        <td class="text-center">Sửa</td>
                     
                                    </tr>
									<tr>
                                        
                                      <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['chuyen_gia_delete']))
													<input name="chuyen_gia_delete" id="chuyen_gia_delete" type="checkbox" value="1" checked="">
												@else
													<input name="chuyen_gia_delete" id="chuyen_gia_delete" type="checkbox" value="1">
												@endif
												<label for="chuyen_gia_delete"></label>
											</div>
                                        </td>
                                        <td class="text-center">Xóa</td>
                          
                                    </tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-2">
						<div style="font-weight: bold; text-align: center; background: #ECECEC; padding: 10px 0 10px 0">DTDA các cấp</div>
		                  <table class="table table-bordered no-more-tables">
								<tbody>
									<tr>
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['dtda_cac_cap_insert']))
													<input name="dtda_cac_cap_insert" id="dtda_cac_cap_insert" type="checkbox" value="1" checked="">
												@else
													<input name="dtda_cac_cap_insert" id="dtda_cac_cap_insert" type="checkbox" value="1">
												@endif
												<label for="dtda_cac_cap_insert"></label>
											</div>
                                        </td>
                                        <td class="text-center">Thêm</td>
                  
                                    </tr>
									<tr>
                                       
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['dtda_cac_cap_update']))
													<input name="dtda_cac_cap_update" id="dtda_cac_cap_update" type="checkbox" value="1" checked="">
												@else
													<input name="dtda_cac_cap_update" id="dtda_cac_cap_update" type="checkbox" value="1">
												@endif
												<label for="dtda_cac_cap_update"></label>
											</div>
                                        </td>
                                        <td class="text-center">Sửa</td>
                     
                                    </tr>
									<tr>
                                        
                                      <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['dtda_cac_cap_delete']))
													<input name="dtda_cac_cap_delete" id="dtda_cac_cap_delete" type="checkbox" value="1" checked="">
												@else
													<input name="dtda_cac_cap_delete" id="dtda_cac_cap_delete" type="checkbox" value="1">
												@endif
												<label for="dtda_cac_cap_delete"></label>
											</div>
                                        </td>
                                        <td class="text-center">Xóa</td>
                          
                                    </tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-2">
							<div style="font-weight: bold; text-align: center; background: #ECECEC; padding: 10px 0 10px 0">Sản Phẩm KHCN</div>
		                  <table class="table table-bordered no-more-tables">
								<tbody>
									<tr>
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['san_pham_insert']))
													<input name="san_pham_insert" id="san_pham_insert" type="checkbox" value="1" checked="">
												@else
													<input name="san_pham_insert" id="san_pham_insert" type="checkbox" value="1">
												@endif
												<label for="san_pham_insert"></label>
											</div>
                                        </td>
                                        <td class="text-center">Thêm</td>
                  
                                    </tr>
									<tr>
                                       
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['san_pham_update']))
													<input name="san_pham_update" id="san_pham_update" type="checkbox" value="1" checked="">
												@else
													<input name="san_pham_update" id="san_pham_update" type="checkbox" value="1">
												@endif
												<label for="san_pham_update"></label>
											</div>
                                        </td>
                                        <td class="text-center">Sửa</td>
                     
                                    </tr>
									<tr>
                                        
                                      <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['san_pham_delete']))
													<input name="san_pham_delete" id="san_pham_delete" type="checkbox" value="1" checked="">
												@else
													<input name="san_pham_delete" id="san_pham_delete" type="checkbox" value="1">
												@endif
												<label for="san_pham_delete"></label>
											</div>
                                        </td>
                                        <td class="text-center">Xóa</td>
                          
                                    </tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-2">
						<div style="font-weight: bold; text-align: center; background: #ECECEC; padding: 10px 0 10px 0">Phát minh sáng chế</div>
		                  <table class="table table-bordered no-more-tables">
								<tbody>
									<tr>
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['pmsc_insert']))
													<input name="pmsc_insert" id="pmsc_insert" type="checkbox" value="1" checked="">
												@else
													<input name="pmsc_insert" id="pmsc_insert" type="checkbox" value="1">
												@endif
												<label for="pmsc_insert"></label>
											</div>
                                        </td>
                                        <td class="text-center">Thêm</td>
                  
                                    </tr>
									<tr>
                                       
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['pmsc_update']))
													<input name="pmsc_update" id="pmsc_update" type="checkbox" value="1" checked="">
												@else
													<input name="pmsc_update" id="pmsc_update" type="checkbox" value="1">
												@endif
												<label for="pmsc_update"></label>
											</div>
                                        </td>
                                        <td class="text-center">Sửa</td>
                     
                                    </tr>
									<tr>
                                        
                                      <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['pmsc_delete']))
													<input name="pmsc_delete" id="pmsc_delete" type="checkbox" value="1" checked="">
												@else
													<input name="pmsc_delete" id="pmsc_delete" type="checkbox" value="1">
												@endif
												<label for="pmsc_delete"></label>
											</div>
                                        </td>
                                        <td class="text-center">Xóa</td>
                          
                                    </tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-2">
							<div style="font-weight: bold; text-align: center; background: #ECECEC; padding: 10px 0 10px 0">Doanh Nghiệp KHCN</div>
		                  <table class="table table-bordered no-more-tables">
								<tbody>
									<tr>
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['doanh_nghiep_insert']))
													<input name="doanh_nghiep_insert" id="doanh_nghiep_insert" type="checkbox" value="1" checked="">
												@else
													<input name="doanh_nghiep_insert" id="doanh_nghiep_insert" type="checkbox" value="1">
												@endif
												<label for="doanh_nghiep_insert"></label>
											</div>
                                        </td>
                                        <td class="text-center">Thêm</td>
                  
                                    </tr>
									<tr>
                                       
                                        <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['doanh_nghiep_update']))
													<input name="doanh_nghiep_update" id="doanh_nghiep_update" type="checkbox" value="1" checked="">
												@else
													<input name="doanh_nghiep_update" id="doanh_nghiep_update" type="checkbox" value="1">
												@endif
												<label for="doanh_nghiep_update"></label>
											</div>
                                        </td>
                                        <td class="text-center">Sửa</td>
                     
                                    </tr>
									<tr>
                                        
                                      <td>
                                          	<div class="checkbox check-default">
												@if(isset($check['doanh_nghiep_delete']))
													<input name="doanh_nghiep_delete" id="doanh_nghiep_delete" type="checkbox" value="1" checked="">
												@else
													<input name="doanh_nghiep_delete" id="doanh_nghiep_delete" type="checkbox" value="1">
												@endif
												<label for="doanh_nghiep_delete"></label>
											</div>
                                        </td>
                                        <td class="text-center">Xóa</td>
                          
                                    </tr>
								</tbody>
							</table>
						</div>
						<div style="clear:both"></div>				
						</div>
                      </div>
                      
				  <div class="form-actions">  
					<div class="pull-right">
					  <button type="submit" class="btn btn-success btn-cons" onclick="return confirm('Bạn có chắc chắn cập nhật thay đổi này ?')"><i class="icon-ok"></i> Cập nhật</button>
					  <a href="{{ URL::asset('quan-tri-vien/quan-ly-nguoi-dung') }}"><button type="button" class="btn btn-danger btn-cons" onclick="return confirm('Bạn có chắc chắn xóa hủy cập nhật người dùng ?')">Hủy</button></a>
					</div>
					</div>
					
				</form>
			</div>
</div>
@endsection

@section('script')
<script src="/webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
 <script>
 	$(document).ready(function() {
 		if($("#author").val() != 'moderator'){
	 			$("#more_option").hide();
	 		}
 		$("#author").change(function(){
	 		if($(this).val() == 'moderator'){
	 			$("#more_option").fadeIn();
	 		}
	 		else {
	 			$("#more_option").fadeOut();
	 		}
	 	});
 	});
 </script>
@endsection