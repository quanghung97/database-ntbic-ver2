<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('style')
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<!-- style -->
  	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/master.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!-- end style -->
</head>
<body>
	<div class="app">
		<nav class="navbar page-navbar">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle menu-hidden-btn" data-toggle="collapse" data-target="#myNavbar">
		        <span class="glyphicon glyphicon-align-justify"></span>                      
		      </button>
		      <a class="navbar-brand" href="{{ URL::asset('/') }}"><span class="logo">NTBIC</span></a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a href="#">Tra cứu thông tin</a></li>
		      	<li><a href="#">Hướng dẫn sử dụng</a></li>
		        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng ký</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<!-- end navbar top -->
		
		<div class="container">
			<!-- search box -->
			<!-- <div class="search-label">
				NGÂN HÀNG THÔNG TIN KHOA HỌC 
			</div> --><form class="search-form" id="search_form" method="GET" action="">
			<div class="search-area col-md-9">
				
	                <div class="input-group">
	                    <input type="text" class="form-control" placeholder="Tìm kiếm..." name="text_search" value="@if(isset($text_search)) {{$text_search}} @endif">
	                    <div class="input-group-btn">
	                        <button type="submit" class="btn submit-button">
	                            <span class="glyphicon glyphicon-search">&nbsp;</span>Tìm kiếm dữ liệu
	                        </button>
	                    </div>
	                </div>
            	
			</div>
			<div class="row col-md-12 filter-row">
				<hr>
				<div class="filter">
					<ul class="list-search-filter">
						<li>
							<a href="{!! url('tat-ca') !!}" id="tat-ca">Tất cả</a>
						</li>
						<li>
							<a href="{!! url('chuyen-gia') !!}" id="chuyen-gia">Chuyên gia KH&CN</a>
						</li>
						<li>
							<a href="{!! url('de-tai-du-an-cac-cap') !!}" id="de-tai">Đề tài, dự án các cấp</a>
						</li>
						<li>
							<a href="{!! url('phat-minh') !!}" id="bang-phat-minh">Bằng phát minh, sáng chế</a>
						</li>
						<li>
							<a href="{!! url('san-pham') !!}" id="san-pham">Sản phẩm, công nghệ mới</a>
						</li>
						<li>
							<a href="{!! url('doanh-nghiep') !!}" id="doanh-nghiep">Doanh nghiệp KH&CN</a>
						</li>
					</ul>
				</div>
			</div>
			
			<!-- end search box -->
			@yield('content')
			</form>
		</div>
		<div class="row div-footer">
			<div class="container">
				<div class="col-md-3 display-block">
					<ul>
						<li><a href="#">Trang chủ</a></li>
						<li><a href="#">Dữ liệu chuyên gia KH&CN</a></li>
						<li><a href="#">Dữ liệu đề tài, dự án KH&CN các cấp</a></li>
						<li><a href="#">Dữ liệu phát minh, sáng chế, giải pháp</a></li>
						<li><a href="#">Dữ liệu sản phẩm, công nghệ mới</a></li>
					</ul>
				</div>
				<div class="col-md-3 display-block">
					<ul>
						<li><a href="#">Dữ liệu doanh nghiệp KH&CN</a></li>
						<li><a href="#">Văn phòng đại diện tại nước ngoài</a></li>
						<li><a href="#">Hướng dẫn sử dụng</a></li>
						<li><a href="#">Giới thiệu về NTBIC</a></li>
					</ul>
				</div>
				<div class="col-md-3 display-block">
					<p class="orange-text">LIÊN HỆ:</p>
					<p>Trung tâm ươm tạo Công nghệ và Doanh nghiệp Khoa học Công nghệ- Viện ứng dụng công nghệ</p>
					<p>Địa chỉ: 25- Lê Thánh Tông- Hoàn Kiếm- Hà Nội</p>
					<p>Hotline: 0439336570</p>
					<p>Email: info@ntbic.com</p>
					<p>Facebook:</p>
				</div>
				<div class="col-md-3 display-block">
					<p class="orange-text">GOOGLE MAP</p>
				</div>
			</div>
		</div>
	</div>

	<!-- script -->
	
	<script src="{{ URL::asset('public/js/jquery-3.1.1.min.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{ URL::asset('public/js/jquery.cookie.js') }}"></script>
	<script src="{{ URL::asset('public/js/my_script.js') }}"></script>
	@yield('script')
</body>
</html>