@extends('layouts.master')
@section('style')
<script type="text/javascript" src="{{ URL::asset('public/js/phan_trang.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_san_pham.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/phan_trang.css') }}">
@endsection

<!-- start content -->
@section('content')
	<div class="row col-md-12 filter-row">
				<div class="filter">
					<ul class="list-search-filter">
						<li>
							<select name='tim_theo'>
								@if($tim_theo == '0')
							  		<option value="0" selected="">Tìm theo</option>
							  	@else
							  		<option value="0">Tìm theo</option>
							  	@endif

							  	@if($tim_theo == '1')
							  		<option value="1" selected="">Tên sản phẩm, ứng dụng</option>
							  	@else
							  		<option value="1">Tên sản phẩm, ứng dụng</option>
							  	@endif

							  	@if($tim_theo == '2')
							  		<option value="2" selected="">Khả năng ứng dụng</option>
							  	@else
							  		<option value="2">Khả năng ứng dụng</option>
							  	@endif

							  	@if($tim_theo == '3')
							  		<option value="3" selected="">Mô tả sản phẩm, ứng dụng</option>
							  	@else
							  		<option value="3">Hướng nghiên cứu</option>
							  	@endif

							  	@if($tim_theo == '4')
							  		<option value="4" selected="">Giải quyết bài toán</option>
							  	@else
							  		<option value="4">Giải quyết bài toán</option>
							  	@endif

							  	@if($tim_theo == '5')
							  		<option value="5" selected="">Thị trường ứng dụng</option>
							  	@else
							  		<option value="5">Thị trường ứng dụng</option>
							  	@endif

							</select>
						</li>
						<li>
							<select name='linh_vuc_khcn'>
							  <option value="0">Lĩnh vực KH&CN</option>
							  @foreach($linh_vuc as $lv)
							  	@if($linh_vuc_current == $lv->id)
							  		<option value="{{$lv->id}}" selected="">{{$lv->linh_vuc}}</option>
							  	@else
							  		<option value="{{$lv->id}}">{{$lv->linh_vuc}}</option>
							  	@endif

							  @endforeach
							</select>
						</li>
					</ul>
				</div>
	</div>



	<!-- main content, display result -->
	@section('main-content')
	<div class="row col-md-12 div-content search_result_san_pham">
		<div class="search-info">
		 <span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm sản phẩm KH&CN: {!! $datas->total() !!} trong {{ $time_search }} giây
		</div>
		<table class="dataTable table-hover table-responsive" id="myTable">
			<thead class="head-dataTable">
				<th class="no">Stt</th>
				<th class="anh">Hình ảnh</th>
				<th class="name">Tên công nghệ, ứng dụng</th>
				<th class="linh_vuc">Lĩnh vực KH&CN</th>
				<th class="ung_dung">Khả năng ứng dụng</th>
			</thead>
			<tbody>
				@foreach($datas as $key=>$sp)
					<tr>
						<td>{!! ($datas->currentPage() - 1)*10 + $key +1 !!}</td>
						<td><img src="{{ URL::asset($sp->anh_san_pham) }}" alt="ảnh" class="anh_san_pham"></td>
						<td><a href="{{ URL::asset('san-pham/'.$sp->link) }}" class="ten_san_pham">{{$sp->ten_san_pham}}</a></td>
						<td>{{$sp->linh_vuc}}</td>
						<td><div class="collapse-div">{{$sp->dac_diem_noi_bat}}</div>
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
<script type="text/javascript">

	$(document).ready(function(){
    	$('.collapse-div').mouseover(function(){
    		$(this).removeClass("collapse-div");
    	});
    	$(".collapse-div").mouseout(function(){
    		$(this).addClass('collapse-div');
    	});
	});
</script>
<script type="text/javascript" src="{{ URL::asset('public/js/cookie.js') }}"></script>
@endsection