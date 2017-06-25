<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- style -->
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/master.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/home.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/responsive.css') }}">
		<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/footer_home.css') }}">
		<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
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
		title: 'Chuyên gia',
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
		title: 'Đề tài, dự án các cấp',
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
		<script>
			$(document).ready(function(){
				$(".dropdown-toggle").dropdown();
				});
		</script>
		@yield('style')
		<!-- end style -->
	</head>
	<body>
		<div class="app">
			<nav class="navbar page-navbar" style="margin-bottom: 0px;border-radius:0px;">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle menu-hidden-btn" data-toggle="collapse" data-target="#myNavbar">
						<span class="glyphicon glyphicon-align-justify"></span>
						</button>
						<a class="navbar-brand" href="/"><span class="logo">NTBIC</span></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{url('huong-dan-su-dung')}}" target="_blank">Hướng dẫn sử dụng</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- end navbar top -->
			{{-- banner --}}
			<div class="top-banner" >
				<div class="inner" >
					<div class="inner1"> <strong>Ngân hàng thông tin Khoa học và Công nghệ</strong> </div>
					{{-- start form --}}
					<div class="search-form " method="GET" action="">
						<fieldset>
							<div class="input-group">
								<input id="text_search" type="text" class="form-control input-lg" placeholder="Tìm kiếm..." name="query">
								<div class="input-group-btn" style="background: none;">
									<a href="#" class="btn-dropdown btn-inverse dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="background-color: #fff; color: black; padding: 6px 12px; text-decoration: none;">
										<span id="nangcao">Nâng cao </span>
										<span class="glyphicon glyphicon-chevron-down" style="top: 3px;color: #777777; padding: 5px;"></span></a>
										<ul id="select_search" class="dropdown-menu" role="menu">
											<li><input type="radio" name="type-search" value="tat-ca" checked="checked"> Tất cả các dữ liệu KH&CN </li>
											<li><input type="radio" name="type-search" value="chuyen-gia"> Dữ liệu chuyên gia KH&CN </li>
											<li><input type="radio" name="type-search" value="de-tai-du-an-cac-cap"> Dữ liệu đề tài, dự án KH&CN </li>
											<li><input type="radio" name="type-search" value="phat-minh"> Dữ liệu bằng phát minh, sáng chế </li>
											<li><input type="radio" name="type-search" value="san-pham"> Dữ liệu sản phẩm, ứng dụng<br> KH&CN </li>
											<li><input type="radio" name="type-search" value="doanh-nghiep"> Dữ liệu doanh nghiệp KH&CN </li>
											<li class="divider" style="padding: 1px;"></li>
											<li><p>Tips: Để tìm kiếm thông tin trong <br>ngân hàng dữ liệu KH&CN bạn cần<br> lựa chọn một trong các thành phần<br> bên trên</p></li>
										</ul>
									</div>
									<div id="search_home" class="input-group-btn btn-search-home">
										<a class="btn submit" style=" padding: 6px 12px;">
											<span class="glyphicon glyphicon-search search1"></span>
											<span id="timkiem"> Tìm kiếm </span>
										</a>
									</div>
								</div>
							</fieldset>
							<div>
								<h3 class="inner2">
								Hiện đang có <span class="num_c">{{$counts['chuyen_gia_khcn']}}</span> chuyên gia;
								<span class="num_c">{{$counts['de_tai_du_an_cac_cap']}}</span> đề tài, dự án các cấp;
								<span class="num_c">{{$counts['bang_phat_minh_sang_che']}}</span> bằng phát minh, sáng chế, giải pháp hữu ích;
								<span class="num_c">{{$counts['doanh_nghiep_khcn']}}</span> doanh nghiệp ứng dụng công nghệ;
								<span class="num_c">68</span> quỹ đầu tư, hỗ trợ cho khoa học và công nghệ;
								<span class="num_c">446</span> trung tâm, viện nghiên cứu trong cơ sở dữ liệu
								</h3>
							</div>
						</div>
						{{-- end form --}}
					</div>
				</div>
				<!-- container -->
				<div class="container">
					<div class="w3-content w3-padding" style="max-width:1564px">
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
					<!--chuyengia -->
					<div class="w3-content w3-padding" style="max-width:1564px">
						<!-- Danh mục -->
						<div class="w3-container w3-padding-32" id="projects">
							<h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Chuyên gia hàng đầu về Khoa học và công nghệ</h3>
						</div>
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								@foreach($chuyen_gia_khcn as $key=>$chuyen_gia)
								@if($key == 0)
								<div class="item active">
									@endif
									@if($key != 0 && $key%4 == 0)
									<div class="item">
										@endif
										<div class="w3-col l3 m6 w3-margin-bottom">
											<span class="span_v">
												<a href="{{ URL::asset('chuyen-gia/'.$chuyen_gia->linkid) }}">
													<img src="{{ URL::asset($chuyen_gia->link_anh) }}" class="img1"><br>
													<strong style="font-size: 15px; padding-top: 5%;padding-left: 12%;">{{ $chuyen_gia->ho_va_ten }}</strong>
												</a>
												<ul class="ul_listloop">
													<p>{{ $chuyen_gia->co_quan }}</p>
												</ul>
											</span>
										</div>
										@if(($key+1)%4 == 0)
									</div>
									@endif
									@endforeach
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="width:0%">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="width:0%">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						{{--Các công nghệ tiên tiến trên thế giới--}}
						<div class="w3-content w3-padding congnghe" style="max-width:1564px">
							<!-- Danh mục -->
							<div class="w3-container w3-padding-32" id="projects">
								<h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Các công nghệ tiên tiến trên thể giới </h3>
								<span class="fr"><a title="Cá nhân" href="/?com=products&amp;fun=search&amp;q=" target="_self" class="viewmore"><i class="fa fa-angle-double-right"></i> Xem thêm</a></span>
							</div>
							<div class="w3-row-padding">
								<div class="w3-col l3 m6 w3-margin-bottom">
									<p style="font-size:14px; padding-bottom:10px"><a href="/products/che-pham-sinh-hoc-trong-canh-tac-che-ca-phe-ho-tieu-o-tay-nguyen-113.html" style="color:#09C"><strong style="font-size: 15px;">Chế phẩm sinh học trong canh tác chè, cà phê, hồ tiêu ở Tây Nguyên</strong></a></p>
									<p >Cập nhât <strong style="font-size: 14px;">14/10/2016</strong></p>
									<p >Thuộc <strong style="font-size: 14px;">Công nghệ sinh học</strong></p>
									<p >Thông qua việc thực hiện Đề tài “Nghiên cứu phát triển và ứng dụng một số chế phẩm có nguồn gốc sinh...</p>
								</div>
								<div class="w3-col l3 m6 w3-margin-bottom">
									<p style="font-size:14px; padding-bottom:10px"><a href="/products/che-pham-sinh-hoc-trong-canh-tac-che-ca-phe-ho-tieu-o-tay-nguyen-113.html" style="color:#09C"><strong style="font-size: 15px;">Chế phẩm sinh học trong canh tác chè, cà phê, hồ tiêu ở Tây Nguyên</strong></a></p>
									<p >Cập nhât <strong style="font-size: 14px;">14/10/2016</strong></p>
									<p >Thuộc <strong style="font-size: 14px;">Công nghệ sinh học</strong></p>
									<p >Thông qua việc thực hiện Đề tài “Nghiên cứu phát triển và ứng dụng một số chế phẩm có nguồn gốc sinh...</p>
								</div>
								<div class="w3-col l3 m6 w3-margin-bottom">
									<p style="font-size:14px; padding-bottom:10px"><a href="/products/che-pham-sinh-hoc-trong-canh-tac-che-ca-phe-ho-tieu-o-tay-nguyen-113.html" style="color:#09C"><strong style="font-size: 15px;">Chế phẩm sinh học trong canh tác chè, cà phê, hồ tiêu ở Tây Nguyên</strong></a></p>
									<p >Cập nhât <strong style="font-size: 14px;">14/10/2016</strong></p>
									<p >Thuộc <strong style="font-size: 14px;">Công nghệ sinh học</strong></p>
									<p >Thông qua việc thực hiện Đề tài “Nghiên cứu phát triển và ứng dụng một số chế phẩm có nguồn gốc sinh...</p>
								</div>
								<div class="w3-col l3 m6 w3-margin-bottom">
									<p style="font-size:14px; padding-bottom:10px"><a href="/products/che-pham-sinh-hoc-trong-canh-tac-che-ca-phe-ho-tieu-o-tay-nguyen-113.html" style="color:#09C"><strong style="font-size: 15px;">Chế phẩm sinh học trong canh tác chè, cà phê, hồ tiêu ở Tây Nguyên</strong></a></p>
									<p >Cập nhât <strong style="font-size: 14px;">14/10/2016</strong></p>
									<p >Thuộc <strong style="font-size: 14px;">Công nghệ sinh học</strong></p>
									<p >Thông qua việc thực hiện Đề tài “Nghiên cứu phát triển và ứng dụng một số chế phẩm có nguồn gốc sinh...</p>
								</div>
							</div>
						</div>
						{{-- 	đối tác --}}
						<div class="w3-content w3-padding doitac" style="max-width:1564px">
							<!-- Danh mục -->
							<div class="w3-container w3-padding-32" id="projects">
								<h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Đối tác</h3>
							</div>
							<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: auto;">
								<!-- Indicators -->
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
									</div>
									<div class="item">
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4  w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<span>Đại học thái nguyên</span>
												</a>
											</span>
										</div>
										<div class="w3-col l2 m4 w3-margin-bottom">
											<span class="span_v">
												<a href="http://khoahoctot.vn/profiles/nguyen-lan-dung-14366.html" title="GS.TS.Nguyễn Lân Dũng">
													<img src="https://www.w3schools.com/w3images/house4.jpg" class="img2"><br>
													<p>Đại học thái nguyên</p>
												</a>
											</span>
										</div>
									</div>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="width:0%">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="width:0%">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<div class="w3-content w3-padding" style="max-width:1564px" >
							<div class="w3-container w3-padding-32" id="projects">
								<h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Địa chỉ</h3>
							</div>
							<div class="col-lg-6 tintuc">
								<div class="fl">
									<div class="clearfix newstop">
										<p style="font-size:14px;"><a href="/products/che-pham-sinh-hoc-trong-canh-tac-che-ca-phe-ho-tieu-o-tay-nguyen-113.html" style="color:#09C"><strong style="font-size: 15px;">Tin tức phổ biến</strong></a></p>
										<ul class="ul_listloop fr" style="padding-top: 0px;">
											<li><a title="Tháp Eiffel - Niềm tự hào của người Pháp" href="/articles/thap-eiffel-niem-tu-hao-cua-nguoi-phap-2720.html">Tháp Eiffel - Niềm tự hào của người Pháp</a></li>
											<li><a title="&quot;Con đường Mặt trời&quot; dành cho xe đạp độc nhất vô nhị tại Hàn Quốc" href="/articles/con-duong-mat-troi-danh-cho-xe-dap-doc-nhat-vo-nhi-tai-han-quoc-2719.html">"Con đường Mặt trời" dành cho xe đạp độc nhất vô nhị tại Hàn Quốc</a></li>
											<li><a title="7 vật thể lớn nhất con người từng phóng vào không gian" href="/articles/7-vat-the-lon-nhat-con-nguoi-tung-phong-vao-khong-gian-2718.html">7 vật thể lớn nhất con người từng phóng vào không gian</a></li>
											<li><a title="Năm ánh sáng là gì? Một năm ánh sáng bằng bao nhiêu km?" href="/articles/nam-anh-sang-la-gi-mot-nam-anh-sang-bang-bao-nhieu-km-2717.html">Năm ánh sáng là gì? Một năm ánh sáng bằng bao nhiêu km?</a></li>
											<li><a title="Xe bay cá nhân đầu tiên trên thế giới thử nghiệm thành công" href="/articles/xe-bay-ca-nhan-dau-tien-tren-the-gioi-thu-nghiem-thanh-cong-2716.html">Xe bay cá nhân đầu tiên trên thế giới thử nghiệm thành công</a></li>
											<li><a title="13 năm nữa con người thọ trung bình 90 tuổi" href="/articles/13-nam-nua-con-nguoi-tho-trung-binh-90-tuoi-2715.html">13 năm nữa con người thọ trung bình 90 tuổi</a></li>
											<li><a title="Tin cực vui cho bệnh nhân ung thư cần xạ trị" href="/articles/tin-cuc-vui-cho-benh-nhan-ung-thu-can-xa-tri-2714.html">Tin cực vui cho bệnh nhân ung thư cần xạ trị</a></li>
											<li><a title="Phẫu thuật thắt dạ dày giúp điều trị bệnh tiểu đường tuýp 2" href="/articles/phau-thuat-that-da-day-giup-dieu-tri-benh-tieu-duong-tuyp-2-2713.html">Phẫu thuật thắt dạ dày giúp điều trị bệnh tiểu đường tuýp 2</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-12" style="padding-bottom:2%;">
								<!-- Add Google Maps -->
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.32192326675!2d105.85650651455113!3d21.019701287003222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abee0f48e19b%3A0x23d765710433152b!2zVmnhu4duIOG7qG5nIEThu6VuZyBDw7RuZyBOZ2jhu4c!5e0!3m2!1svi!2s!4v1489416948702" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				<!---phan footer-->
				<div class="row div-footer">
					<div class="container">
						<div class="col-md-4 display-block">
							<p>Trung tâm Ươm tạo Công nghệ và Doanh nghiệp Khoa học Công nghệ- Viện Ứng dụng Công nghệ</p>
		      				<p><i class="fa fa-map-pin"></i> Địa chỉ: 25 Lê Thánh Tông, Hoàn Kiếm, Hà Nội</p>
		        			<p><i class="fa fa-phone"></i> Hotline: 0439336570</p>
		       				<p><i class="fa fa-envelope"></i> E-mail: info@ntbic.com</p>
		        
						</div>
						<div class="col-md-3 display-block">
							<ul>
							<li><a href="{!! url('chuyen-gia') !!}">	Dữ liệu chuyên gia KH&CN</a></li>
							<li><a href="{!! url('de-tai-du-an-cac-cap') !!}">	Dữ liệu đề tài, dự án các cấp</a></li>
							<li><a href="{!! url('phat-minh') !!}">	Dữ liệu phát minh, sáng chế</a></li>
							<li><a href="{!! url('san-pham') !!}">	Dữ liệu sản phẩm, công nghệ mới</a></li>
							<li><a href="{!! url('doanh-nghiep') !!}">	Dữ liệu doanh nghiệp KH&CN</a></li>
							</ul>
						</div>
						<div class="col-md-3 display-block">
							<li><a href="{{url('huong-dan-su-dung')}}">	Hướng dẫn sử dụng</a></li>
							<li><a href="http://ntbic.com/">	Giới thiệu về NTBIC</a></li>
						</div>
						<div class="col-md-2 display-block">
				          	 <div class="social-icons">
			                                
				           		<ul class="nomargin">
				                                    
				               		 <a href="#"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
					           		 <a href="#"><i class="fa fa-pinterest-square fa-3x social-fr" id="social"></i></a>
					           		 <a href="#"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
					                              
				          		</ul>
			           		 </div>
						</div>
					</div>
				</div>
				<div class="copyright">
						<div class="container">
							<div class="col-md-6">
								<p>Copyright © 2016 csdl.ntbic.com</p>
							</div>
							<div class="col-md-6">
								<ul class="bottom_ul">
									<li><a href="https://www.google.com/maps/place/Vi%E1%BB%87n+%E1%BB%A8ng+D%E1%BB%A5ng+C%C3%B4ng+Ngh%E1%BB%87/@21.006394,105.8129819,14z/data=!4m8!1m2!2m1!1zVHJ1bmcgdMOibSDGr8ahbSB04bqhbyBDw7RuZyBuZ2jhu4cgdsOgIERvYW5oIG5naGnhu4dwIEtob2EgaOG7jWMgQ8O0bmcgbmdo4buHLSBWaeG7h24g4buobmcgZOG7pW5nIEPDtG5nIG5naOG7hw!3m4!1s0x3135abee0f48e19b:0x23d765710433152b!8m2!3d21.0198013!4d105.8586952">Site Map</a></li>
								</ul>
							</div>
						</div>
				</div>
	<!-- script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{ URL::asset('public/js/my_script.js') }}"></script>
	</body>
</html>