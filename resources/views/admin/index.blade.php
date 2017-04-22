@extends('admin.home')
@section('is_active_home')
	active
@endsection
@section('main')
	<div class="w3-content w3-padding" style="max-width:1564px; ">
	  <!-- Danh mục -->
		<div class="w3-container w3-padding-32" id="projects">
		    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Thống kê chung </h3>
		</div>
		<div id="piechart1" class="col-lg-4" style=" height: 300px;"></div>
		<div id="piechart2" class="col-lg-4" style=" height: 300px;"></div>
		<div id="piechart3" class="col-lg-4" style=" height: 300px;"></div>

	</div>
	<div class="w3-content w3-padding" style="max-width:1564px">
		<div id="piechart4" class="col-lg-6" style=" height: 300px;"></div>
		<div id="piechart5" class="col-lg-6" style=" height: 300px;"></div>
	</div>

@endsection
@section('script')
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
		['TS',     {{$datachuyengia['TS']}}],
		['ThS',      {{$datachuyengia['ThS']}}],
		['KS',  {{$datachuyengia['KS']}}],
		['CN',    {{$datachuyengia['CN']}}],
		['Khác', {{$datachuyengia['other']}}]
		]);
		var options = {
		title: 'Nhà khoa học',
		chartArea:{width:'90%',height:'90%'}
		};
		var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
		chart.draw(data, options);
		}
		</script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
		['Khoa học kỹ thuật và công nghệ',  {{$datadetai['kh_kt_cn']}}],
		['Khoa học nhân văn',  {{$datadetai['kh_nhan_van']}}],
		['Khoa học nông nghiệp', {{$datadetai['kh_nong_nghiep']}}],
		['Khoa học tự nhiên',    {{$datadetai['kh_tu_nhien']}}],
		['Khoa học xã hội',    {{$datadetai['kh_xa_hoi']}}],
		['Khoa học y, dược', {{$datadetai['kh_y_duoc']}}],
		['Khác',  {{$datadetai['other']}}]
		]);
		var options = {
		title: 'Đề tài -dự án các cấp',
		chartArea:{width:'90%',height:'90%'}
		};
		var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
		chart.draw(data, options);
		}
		</script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
					function drawChart() {
					var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Công nghệ thông tin và truyền thông',     {{$datasanpham['cntt_va_truyen_thong']}}],
				['Công nghệ sinh học',  {{$datasanpham['cn_sinh_hoc']}}],
				['Công nghệ vật liệu mới',  {{$datasanpham['cn_vat_lieu_moi']}}],
				['Công nghệ chế tạo máy - tự động hóa',  {{$datasanpham['cn_ctm_tdh']}}],
				['Công nghệ môi trường',  {{$datasanpham['cn_moi_truong']}}],
				['Công nghệ năng lượng mới',  {{$datasanpham['cn_nang_luong_moi']}}],
				['Công nghệ vũ trụ',  {{$datasanpham['cn_vu_tru']}}],
				['Công nghệ khác',  {{$datasanpham['cn_khac']}}]
				]);
				var options = {
				title: 'Sản phẩm',
				chartArea:{width:'90%',height:'90%'}
				};
				var chart = new google.visualization.PieChart(document.getElementById('piechart3')); chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
		['Công nghệ thông tin và truyền thông',     {{$dataphatminh['cntt_va_truyen_thong']}}],
		['Công nghệ sinh học',  {{$dataphatminh['cn_sinh_hoc']}}],
		['Công nghệ vật liệu mới',  {{$dataphatminh['cn_vat_lieu_moi']}}],
		['Công nghệ chế tạo máy - tự động hóa',  {{$dataphatminh['cn_ctm_tdh']}}],
		['Công nghệ môi trường',  {{$dataphatminh['cn_moi_truong']}}],
		['Công nghệ năng lượng mới',  {{$dataphatminh['cn_nang_luong_moi']}}],
		['Công nghệ vũ trụ',  {{$dataphatminh['cn_vu_tru']}}],
		['Công nghệ khác',  {{$dataphatminh['cn_khac']}}]
		]);
		var options = {
		title: 'Phát minh',
		chartArea:{width:'75%',height:'75%'}
		};
		var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
		chart.draw(data, options);
		}
		</script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
		['Công nghệ thông tin và truyền thông',     {{$datadoanhnghiep['cntt_va_truyen_thong']}}],
		['Công nghệ sinh học',  {{$datadoanhnghiep['cn_sinh_hoc']}}],
		['Công nghệ vật liệu mới',  {{$datadoanhnghiep['cn_vat_lieu_moi']}}],
		['Công nghệ chế tạo máy - tự động hóa',  {{$datadoanhnghiep['cn_ctm_tdh']}}],
		['Công nghệ môi trường',  {{$datadoanhnghiep['cn_moi_truong']}}],
		['Công nghệ năng lượng mới',  {{$datadoanhnghiep['cn_nang_luong_moi']}}],
		['Công nghệ vũ trụ',  {{$datadoanhnghiep['cn_vu_tru']}}],
		['Công nghệ khác',  {{$datadoanhnghiep['cn_khac']}}]
		]);
		var options = {
		title: 'Doanh nghiệp',
		chartArea:{width:'75%',height:'75%'}
		};
		var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
		chart.draw(data, options);
		}
		</script>
@endsection