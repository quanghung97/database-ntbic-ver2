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
							  		<option value="1" selected="">Nhan đề</option>
							  	@else
							  		<option value="1">Nhan đề</option>
							  	@endif

							  	@if($tim_theo == '2')
							  		<option value="2" selected="">Tác giả</option>
							  	@else
							  		<option value="2">Tác giả</option>
							  	@endif

							  	@if($tim_theo == '3')
							  		<option value="3" selected="">Tóm tắt</option>
							  	@else
							  		<option value="3">Tóm tắt</option>
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
					<th class="nhan_de">Nhan đề</th>
					<th class="tac_gia">Tác giả</th>
					<th class="dang_tai_lieu">Dạng tài liệu</th>
					<th class="nam_xuat_ban">Năm xuất bản</th>
				</thead>
				<tbody>
					@foreach($datas as $key=>$item)
						<tr>
							<td>{!! ($datas->currentPage() - 1)*10 + $key +1 !!}</td>
							<td><a href="{{ URL::asset('khoa-hoc-cong-nghe/'.$item->id) }}" class="ten_de_tai">{{$item->nhan_de}}</a></td>
							<td>{{$item->tac_gia}}</td>
							<td>{{$item->dang_tai_lieu}}</td>
							<td>{{$item->nam_xuat_ban}}</td>
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