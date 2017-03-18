@extends('layouts.master')
@section('style')
<script type="text/javascript" src="{{ URL::asset('public/js/phan_trang.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_de_tai.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/phan_trang.css') }}">
@endsection

<!-- start content -->
@section('content')
	<div class="row col-md-12 filter-row">
				<div class="filter">
					<ul class="list-search-filter">
						<li>
							<select name="tim_theo">
								@if($tim_theo == '0')
							  		<option value="0" selected="">Tìm theo</option>
							  	@else
							  		<option value="0">Tìm theo</option>
							  	@endif

							  	@if($tim_theo == '1')
							  		<option value="1" selected="">Tên báo cáo</option>
							  	@else
							  		<option value="1">Tên báo cáo</option>
							  	@endif

							  	@if($tim_theo == '2')
							  		<option value="2" selected="">Trạng thái</option>
							  	@else
							  		<option value="2">Trạng thái</option>
							  	@endif

							  	@if($tim_theo == '3')
							  		<option value="3" selected="">Mã số đề tài</option>
							  	@else
							  		<option value="3">Mã số đề tài</option>
							  	@endif

							  	@if($tim_theo == '4')
							  		<option value="4" selected="">Cơ quan chủ trù</option>
							  	@else
							  		<option value="4">Cơ quan chủ trì</option>
							  	@endif

							  	@if($tim_theo == '5')
							  		<option value="5" selected="">Tóm tắt</option>
							  	@else
							  		<option value="5">Tóm tắt</option>
							  	@endif
							</select>
						</li>
						<li>
							<select name='cap_quan_ly'>
							  <option value="cap_quan_ly">Cấp quản lý</option>
							  		@if($cap_quan_ly_current == 'cơ sở')
							  			<option value="cơ sở" selected="">Cơ sở</option>
							  		@else
							  			<option value="cơ sở">Cơ sở</option>
							  		@endif

							  		@if($cap_quan_ly_current == 'quốc gia')
							  			<option value="quốc gia" selected="">Quốc gia</option>
							  		@else
							  			<option value="quốc gia">Quốc gia</option>
							  		@endif

							  		@if($cap_quan_ly_current == 'bộ')
							  			<option value="bộ" selected="">Bộ</option>
							  		@else
							  			<option value="bộ">Bộ</option>
							  		@endif
							</select>
						</li>
					</ul>
				</div>
	</div>
	<!-- main content,display result -->
	@section('main-content')
	<div class="row col-md-12 div-content search_result_de_tai_du_an_cac_cap">
			<div class="search-info">
				<span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm đề tài dự án các cấp: {!! $datas->total() !!} trong {{ $time_search }} giây
			</div>
			<table class="dataTable table-hover table-responsive" id="myTable">
				<thead class="head-dataTable">
					<th class="no">Stt</th>
					<th class="ten_bao_cao">Tên Báo cáo</th>
					<th class="linh_vuc_nghien_cuu">Lĩnh vực nghiên cứu</th>
					<th class="ma_so_de_tai">Mã số đề tài</th>
					<th class="tinh">Tỉnh thành</th>
					<th class="co_quan_chu_tri">Cơ quan chủ trì</th>
					<th class="thoi_gian_bat_dau">Thời gian</th>
				</thead>
				<tbody>
					@foreach($datas as $key=>$item)
						<tr>
							<td>{!! ($datas->currentPage() - 1)*10 + $key +1 !!}</td>
							<td><a href="{{ URL::asset('de-tai-du-an/'.$item->link) }}" class="ten_de_tai">{{$item->ten_bao_cao}}</a></td>
							<td>{{$item->linh_vuc_nghien_cuu}}</td>
							<td>{{$item->ma_so_de_tai}}</td>
							<td>{{$item->tinh}}</td>
							<td>{{$item->co_quan_chu_tri}}</td>
							<td>{{$item->thoi_gian_bat_dau}}-{{$item->thoi_gian_ket_thuc}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div>
				{!! $datas->appends(request()->input())->links() !!}
			</div>
		</div>
	@show

	<!-- end main content -->
@endsection
<!-- end content -->
@section('script')
	<script type="text/javascript" src="{{ URL::asset('public/js/cookie.js') }}"></script>
@endsection