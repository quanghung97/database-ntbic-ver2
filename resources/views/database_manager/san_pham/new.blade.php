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
	<h4 class="form-title">THÊM SẢN PHẨM</h4>
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
				<form id="form_iconic_validation" action="{{route('tao-san-pham')}}" method="post">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
                      <div class="form-group">
                        <label class="form-label">Tên SẢN PHẨM</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="ten_san_pham" id="form1Name" class="form-control">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Lĩnh Vực</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<select name="linh_vuc" id="gendericonic" class="select2 form-control"  >
                         @foreach($linh_vuc as $item)
                          <option value="{{$item->id}}">{{$item->linh_vuc}}</option>
                          @endforeach
                          
                        </select>                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Các điểm nổi bật</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="dac_diem_noi_bat" id="form1Url" class="form-control"> 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mô tả chung</label>
						<textarea name="mo_ta_chung" id=""></textarea>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Quy trình chuyển giao</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="quy_trinh_chuyen_giao" id="form1Url" class="form-control">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Khả năng ứng dụng</label>
                        
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="kha_nang_ung_dung" id="form1Url" class="form-control">                                 
						</div>
                      </div>
                      
                      <div class="form-group">
				        <span class="form-label">Chọn file ảnh upload</span>
		                <input name="logo" type="file" multiple />
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