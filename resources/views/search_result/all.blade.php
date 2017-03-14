@extends('layouts.master')
@section('style')
<script type="text/javascript" src="{{ URL::asset('public/js/phan_trang.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_chuyen_gia.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_doanh_nghiep.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_de_tai.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_san_pham.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_phat_minh_sang_che.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/phan_trang.css') }}">

@endsection

<!-- start content -->
@section('content')
	<div class="row col-md-12 filter-row">
				<div class="filter">

				</div>
	</div>


	<!-- main content, display result -->
		@section('main-content')
		<div class="row col-md-12 div-content search_result_chuyen_gia">
			<div class="search-info">
							<span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm chuyên gia KH&CN: {!! $chuyen_gias->total() !!} trong {{ $chuyen_gia_time_search }} giây <a target="_blank" href="{!! URL::asset('/chuyen-gia?text_search='.$text_search) !!}"> <span class="glyphicon glyphicon-circle-arrow-right
				"></span> Xem tất cả</a>
			</div>
			<table class="dataTable table-hover table-responsive" id="myTable">
				<thead class="head-dataTable">
					<th class="no">Stt</th>
					<th class="anh">Ảnh</th>
					<th class="name">Họ và tên</th>
					<th class="co_quan">Cơ quan công tác</th>
					<th class="linh_vuc">Lĩnh vực nghiên cứu</th>
					<th class="tinh_thanh">Tỉnh thành</th>
				</thead>
				<tbody>
					@foreach($chuyen_gias as $key=>$chuyen_gia)
						<tr>
							<td>{{ $key+1 }}</td>
							<td><img src="{{ URL::asset($chuyen_gia->link_anh) }}" alt="ảnh" class="img-circle anh_chuyen_gia"></td>
							<td><a href="{{ URL::asset('chuyen-gia/'.$chuyen_gia->linkid) }}" class="ten_chuyen_gia">{{$chuyen_gia->hoc_vi}} {{$chuyen_gia->ho_va_ten}}</a></td>
							<td>{{ $chuyen_gia->co_quan }}</td>
							<td>{!! $chuyen_gia->chuyen_nganh !!}</td>
							<td>{{ $chuyen_gia->tinh_thanh }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
		<div class="row col-md-12 div-content search_result_de_tai_du_an_cac_cap">
			<div class="search-info">
			<span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm đề tài dự án các cấp: {!! $de_tai_du_an_cac_caps->total() !!} trong {{ $de_tai_du_an_cac_cap_time_search }} giây <a target="_blank" href="{!! URL::asset('/de-tai-du-an-cac-cap?text_search='.$text_search) !!}"> <span class="glyphicon glyphicon-circle-arrow-right
				"></span> Xem tất cả</a>
			</div>
			<table class="dataTable table-hover table-responsive" id="myTable">
				<thead class="head-dataTable">
					<th class="no">Stt</th>
					<th class="anh">Tên đề tài, dự án</th>
					<th class="name">Lĩnh vực KH&CN</th>
					<th class="co_quan">Mã số, ký hiệu</th>
					<th class="linh_vuc">CNĐT, tác giả</th>
					<th class="tinh_thanh">Thời gian kết thúc</th>
				</thead>
				<tbody>
					@foreach($de_tai_du_an_cac_caps as  $key=>$de_tai_du_an_cac_cap)
						<tr>
							<td>{{ $key+1 }}</td>
							<td><a href="{{ URL::asset('de-tai-du-an-cac-cap/'.$de_tai_du_an_cac_cap->link) }}" class="ten_de_tai">{{$de_tai_du_an_cac_cap->ten_de_tai}}</a></td>
							<td>{{$de_tai_du_an_cac_cap->linh_vuc}}</td>
							<td>{{$de_tai_du_an_cac_cap->maso_kyhieu}}</td>
							<td>{{$de_tai_du_an_cac_cap->chu_nhiem_detai}}</td>
							<td>{{$de_tai_du_an_cac_cap->nam_bat_dau}}-{{$de_tai_du_an_cac_cap->nam_ket_thuc}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="row col-md-12 div-content search_result_phat_minh">
			<div class="search-info">
			<span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm bằng phát minh, sáng chế: {!! $bang_phat_minh_sang_ches->total() !!} trong {{ $bang_phat_minh_sang_che_time_search }} giây <a target="_blank" href="{!! URL::asset('/phat-minh?text_search='.$text_search) !!}"> <span class="glyphicon glyphicon-circle-arrow-right
				"></span> Xem tất cả</a>
			</div>
			<table class="dataTable table-hover table-responsive" id="myTable">
				<thead class="head-dataTable">
					<th class="no">Stt</th>
					<th class="anh">Tên bằng phát minh, sáng chế, giải pháp hữu ích</th>
					<th class="name">Lĩnh vực KH&CN</th>
					<th class="co_quan">Số, ký hiệu, bằng</th>
					<th class="linh_vuc">Tác giả</th>
					<th class="tinh_thanh">Ngày công bố</th>
				</thead>
				<tbody>
					@foreach($bang_phat_minh_sang_ches as  $key=>$bang_phat_minh_sang_che)
					<tr>
						<td>{{ $key+1 }}</td>
						<td><a href="{{ URL::asset('phat-minh/'.$bang_phat_minh_sang_che->link) }}" class="ten_bang_phat_minh">{{$bang_phat_minh_sang_che->ten}}</a></td>
						<td>{{$bang_phat_minh_sang_che->linh_vuc}}</td>
						<td>{{$bang_phat_minh_sang_che->sobang_kyhieu}}</td>
						<td>{{$bang_phat_minh_sang_che->tac_gia}}</td>
						<td>{{$bang_phat_minh_sang_che->ngay_cong_bo}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

		<div class="row col-md-12 div-content search_result_san_pham">
			<div class="search-info">
			<span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm sản phẩm KH&CN: {!! $san_phams->total() !!} trong {{ $san_pham_time_search }} giây <a target="_blank" href="{!! URL::asset('/san-pham?text_search='.$text_search) !!}"> <span class="glyphicon glyphicon-circle-arrow-right
				"></span> Xem tất cả</a>
			</div>
			<table class="dataTable table-hover table-responsive" id="myTable">
				<thead class="head-dataTable">
					<th class="no">Stt</th>
					<th class="anh">Hình ảnh</th>
					<th class="name">Tên công nghệ, ứng dụng</th>
					<th class="co_quan">Lĩnh vực KH&CN</th>
					<th class="linh_vuc">Khả năng ứng dụng</th>
				</thead>
				<tbody>
					@foreach($san_phams as  $key=>$san_pham)
					<tr>
						<td>{{ $key+1 }}</td>
						<td><img src="{{ URL::asset($san_pham->anh_san_pham) }}" alt="ảnh" class="anh_san_pham"></td>
						<td><a href="{{ URL::asset('san-pham/'.$san_pham->link) }}" class="ten_san_pham">{{$san_pham->ten_san_pham}}</a></td>
						<td>{{$san_pham->linh_vuc}}</td>
						<td><div class="collapse-div">{{$san_pham->dac_diem_noi_bat}}</div>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

		<div class="row col-md-12 div-content search_result_doanh_nghiep">
			<div class="search-info">
			<span class="glyphicon glyphicon-search
				"></span> Kết quả tìm kiếm doanh nghiệp KH&CN: {!! $doanh_nghieps->total() !!} trong {{ $doanh_nghiep_time_search }} giây <a target="_blank" href="{!! URL::asset('/doanh-nghiep?text_search='.$text_search) !!}"> <span class="glyphicon glyphicon-circle-arrow-right
				"></span> Xem tất cả</a>
			</div>
			<table class="dataTable table-hover table-responsive" id="myTable">
				<thead class="head-dataTable">
					<th class="no">Stt</th>
					<th class="anh">Logo</th>
					<th class="name">Tên doanh nghiệp/ tổ chức</th>
					<th class="co_quan">Lĩnh vực KH&CN</th>
					<th class="linh_vuc">Trụ sở</th>
					<th class="linh_vuc">Tỉnh, thành phố</th>
					<th class="linh_vuc">Xếp hạng</th>
				</thead>
				<tbody>
					@foreach($doanh_nghieps as  $key=>$dn)
						<tr>
							<td>{{ $key+1 }}</td>
							<td><img src="{{ URL::asset($dn->logo) }}" alt="logo" class="logo_doanh_nghiep"></td>
							<td><a href="{{ URL::asset('doanh-nghiep/'.$dn->link) }}" class="ten_doanh_nghiep">{{$dn->ten_doanh_nghiep}}</a></td>
							<td>{{$dn->linh_vuc}}</td>
							<td>{{$dn->dia_chi}}</td>
							<td>{{$dn->tinh_thanh_pho}}</td>
							<td>{{$dn->xep_hang_trinh_do_khcn}}</td>
						</tr>
				@endforeach
				</tbody>
			</table>
		</div>

	@show

	<!-- end main content -->
@endsection
<!-- end content -->
@section('script')
	
@endsection