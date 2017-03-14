@extends('layouts.master')
@section('style')
<script type="text/javascript" src="{{ URL::asset('public/js/phan_trang.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_phat_minh_sang_che.css') }}">
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
							  		<option value="1" selected="">Tên phát minh, sáng chế, giải pháp</option>
							  	@else
							  		<option value="1">Tên phát minh, sáng chế, giải pháp</option>
							  	@endif

							  	@if($tim_theo == '2')
							  		<option value="2" selected="">Điểm nổi bật</option>
							  	@else
							  		<option value="2">Điểm nổi bật</option>
							  	@endif

							  	@if($tim_theo == '3')
							  		<option value="3" selected="">Tác giả</option>
							  	@else
							  		<option value="3">Tác giả</option>
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
						<li>
							<select name="loai">
							  <option value="0">Loại</option>
							  @foreach($loai_phat_minh as $loai)
							  	@if($loai_phat_minh_current == $loai->id)
							  		<option value="{{$loai->id}}" selected="">{{$loai->loai_phat_minh_sang_che}}</option>
							  	@else
							  		<option value="{{$loai->id}}">{{$loai->loai_phat_minh_sang_che}}</option>
							  	@endif
							  @endforeach
							</select>
						</li>
					</ul>
				</div>
	</div>


	<!-- main content, display result -->
	@section('main-content')
	<div class="row col-md-12 div-content search_result_phat_minh">
		<div class="search-info">
		 	<span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm phát minh sáng chế: {!! $datas->total() !!} trong {{ $time_search }} giây
		</div>
		<table class="dataTable table-hover table-responsive" id="myTable">
			<thead class="head-dataTable">
				<th class="no">Stt</th>
				<th class="name">Tên bằng phát minh, sáng chế, giải pháp hữu ích</th>
				<th class="linh_vuc">Lĩnh vực KH&CN</th>
				<th class="so_hieu">Số, ký hiệu, bằng</th>
				<th class="tac_gia">Tác giả</th>
				<th class="date">Ngày công bố</th>
			</thead>
			<tbody>
				@foreach($datas as $key=>$pm)
					<tr>
						<td>{!! ($datas->currentPage() - 1)*10 + $key +1 !!}</td>
						<td><a href="{{ URL::asset('phat-minh/'.$pm->link) }}" class="ten_bang_phat_minh">{{$pm->ten}}</a></td>
						<td>{{$pm->linh_vuc}}</td>
						<td>{{$pm->sobang_kyhieu}}</td>
						<td>{{$pm->tac_gia}}</td>
						<td>{{$pm->ngay_cong_bo}}</td>
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