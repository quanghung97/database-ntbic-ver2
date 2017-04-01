<!DOCTYPE html>
<html>
<head>
	
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
		  </div>
		</nav>
		<!-- end navbar top -->
		<div class="container">
			<p align="center">
			    <strong></strong>
			</p>
			<p align="center">
			    <strong>HỆ THỐNG CƠ SỞ DỮ LIỆU KHOA HỌC CÔNG NGHỆ</strong>
			</p>
			<p align="center">
			    <strong>TÀI LIỆU HƯỚNG DẪN SỬ DỤNG FRONTEND</strong>
			</p>
			<p align="right">
			    Phiên bản tài liệu: 1.0
			</p>
			<p align="right">
			    HÀ NỘI, 03/2017
			</p>
			<a href="#_Toc478236643" style="text-decoration:none;"><h3>1. Tổng quan</h3></a>
			<a href="#_Toc478236644" style="text-decoration:none;"><h5>1.1 Mô tả chức năng</h5></a>
			<a href="#_Toc478236645" style="text-decoration:none;"><h5>1.2 Danh sách tính năng</h5></a>
			<a href="#_Toc478236646" style="text-decoration:none;"><h3>2. Mô tả chi tiết tính năng</h3></a>
			<a href="#_Toc478236647" style="text-decoration:none;"><h5>2.1 Trang chủ</h5>
			<a href="#_Toc478236648" style="text-decoration:none;"><h5>2.2 Tìm kiếm trên trang chủ</h5></a>
			<a href="#_Toc478236649" style="text-decoration:none;"><h5>2.3 Tìm kiếm trên bộ lọc từng mục</h5></a>
			<a href="#_Toc478236650" style="text-decoration:none;"><h6>2.3.1. Bộ lọc Chuyên gia KH&amp;CN</h6></a>
			<a href="#_Toc478236651" style="text-decoration:none;"><h6>2.3.2. Bộ lọc Đề tài dự án các cấp</h6></a>
			<a href="#_Toc478236652" style="text-decoration:none;"><h6>2.3.3. Bộ lọc Bằng phát minh, sáng chế</h6></a>
			<a href="#_Toc478236653" style="text-decoration:none;"><h6>2.3.4. Bộ lọc Sản phẩm, công nghệ mới</h6></a>
			<a href="#_Toc478236654" style="text-decoration:none;"><h6>2.3.1. Bộ lọc Doanh Nghiệp KH&amp;CN</h6></a>
			<br clear="all"/>
			<p>
			    <strong><em>1. </em></strong>
			    <strong><em> <a name="_Toc478236643">Tổng quan</a></em></strong>
			</p>
			<p>
			    <strong>1.1</strong>
			    <em> </em>
			    <a name="_Toc478236644"><strong>Mô tả chức năng</strong></a>
			    <strong> </strong>
			</p>
			<p>
			    Ở phiên bản đầu tiên, hệ thống cơ sở dữ liệu khoa học công nghệ tập trung
			    chủ yếu ở chức năng chính là tìm kiếm và quản lý cơ sở dữ liệu.
			</p>
			<p>
			    Phần frontend của hệ thống hướng tới phục vụ hiển thị giao diện cho các
			    chức năng chính trên. Giao diện phiên bản hiện tại đã hiển thị ổn, tự động
			    căn chỉnh theo kích thước màn hình trên pc, laptop, ipad và các thiết bị di
			    động.
			</p>
			<p>
			    <strong>1.2</strong>
			    <strong> <a name="_Toc478236645">Danh sách tính năng</a></strong>
			</p>
			<ul>
			    <li>
			        Trang chủ
			    </li>
			    <li>
			        Tìm kiếm trên trang chủ
			    </li>
			    <li>
			        Tìm kiếm theo bộ lọc từng mục
			    </li>
			</ul>
			<p>
			    <a name="_Toc478236646">
			        <strong><em>2. </em></strong>
			        <strong><em>Mô tả chi tiết tính năng</em></strong>
			    </a>
			    <strong><em></em></strong>
			</p>
			<p>
			    <strong>2.1</strong>
			    <strong> <a name="_Toc478236647">Trang chủ</a></strong>
			</p>
			<p>
			    2.1.1 Mô tả
			</p>
			<p>
			    Trang chủ chứa thanh tìm kiếm/ tìm kiếm nâng cao, các số liệu thống kê số
			    lượng dữ liệu theo từng mục trong hệ thống, các biểu đồ thống kê, danh
			    sahcs các chuyên gia hàng đầu( slideshow), bản đồ vị trí trụ sở hệ thống và
			    các link chuyển hạng mục.
			</p>
			<p>
			    2.1.2 Thao tác giao diện
			</p>
			<ul>
			    <li>
			        Thanh search và thống kê dữ liệu tổng quan
			    </li>
			</ul>
			<p>
			    <img
			        src="storage/app/public/media/huong-dan/search.jpg"
			    />
			</p>
			<ul>
			    <li>
			        Thống kê dữ liệu dạng biểu đồ
			    </li>
			</ul>
			<p>
			    <img
			        src="storage/app/public/media/huong-dan/chart.jpg"
			    />
			</p>
			<ul>
			    <li>
			        Danh sách các chuyên gia hàng đầu (slide show)
			    </li>
			</ul>
			<p>
			    <img
			        src="storage/app/public/media/huong-dan/professor.jpg"
			    />
			</p>
			<ul>
			    <li>
			        Người dùng có thể chọn bản đồ, tùy chỉnh vị trí, kích cỡ bản đồ
			    </li>
			</ul>
			<p>
			    <img
			        src="storage/app/public/media/huong-dan/map.jpg"
			    />
			</p>
			<p>
			    · Click chuột vào các link phần cuối trang để chuyển hướng tới kho dữ liệu
			    tương ứng với tiêu đề link.
			</p>
			<p>
			    Ví dụ: chọn link dữ liệu chuyên gia sẽ chuyển hướng đến trang danh sách tất
			    cả chuyên gia( chính là trang tất cả kết quả tìm kiếm của chuyên gia, có
			    thanh search và bộ lọc tìm kiếm cho dữ liệu chuyên gia)
			</p>
			<p>
			    <img
			        src="storage/app/public/media/huong-dan/footer.jpg"
			    />
			</p>
			<div>
			    <img  style="display:inline-block; width: 250px; height:400px; float:left; margin: 1.2%;" src="storage/app/public/media/huong-dan/miniChart.jpg"/>
			    <img  style="display:inline-block; width: 250px; height:400px; float:left; margin: 1.2%;" src="storage/app/public/media/huong-dan/mobi_search.jpg"/>
			    <img  style="display:inline-block; width: 250px; height:400px; float:left; margin: 1.2%;" src="storage/app/public/media/huong-dan/mobi_map.jpg"/>
			    <img  style="display:inline-block; width: 250px; height:400px; float:left; margin: 1.2%;" src="storage/app/public/media/huong-dan/mobi_footer.jpg"/>
			    <p align="center">Giao diện trên thiết bị di động</p>
			</div>
			
			<p>
			    <strong>2.2</strong>
			    <strong> <a name="_Toc478236648">Tìm kiếm trên trang chủ</a></strong>
			</p>
			<p>
			    2.2.1 Mô tả
			</p>
			<p>
			    Nhập từ khóa và tùy chỉnh bộ lọc sẵn có để tìm kiếm dữ liệu
			</p>
			<p>
			    2.2.2 Thao tác trên giao diện
			</p>
			<ul>
			    <li>
			        Kích chuột vào khung nhập của phần tìm kiếm, nhập từ khóa tìm kiếm
			    </li>
			    <li>
			        Tùy chỉnh bộ lọc tìm kiếm theo mục đích( chọn trong list)
			    </li>
			    <li>
			        Kich chuột vào Tìm kiếm hoặc ấn enter bắt đầu tìm kiếm
			    </li>
			</ul>
			<p>
			    <img			        
			        src="storage/app/public/media/huong-dan/search_guide.jpg"
			    />
			</p>
			<p>
			    <em>Kết quả</em>
			    : Hệ thống tìm kiếm cơ sở dữ liệu liên quan và trả về danh sách kết quả tìm
			    kiếm.
			</p>
			<p>
			    o Chọn Tất cả các dữ liệu KH&amp;CN, hệ thống sẽ chuyển hướng đến trang tất
			    cả dữ liệu, trả về tất cả các dữ liệu có nội dung chứa từ khóa tìm kiếm,
			    bao gồm cả dữ liệu chuyên gia, đề tài dự án, bằng phát minh sáng chế, sản
			    phẩm ứng dụng và doanh nghiệp.
			</p>
			<p>
			    <img			        
			        src="storage/app/public/media/huong-dan/G1.jpg"
			    />
			</p>
			<p>
			    <img
			        src="storage/app/public/media/huong-dan/G2.jpg"
			    />
			</p>
			<p>
			    o Chọn Dữ liệu chuyên gia KH&amp;CN, hệ thống sẽ chuyển hướng đến trang dữ
			    liệu chuyên gia, trả về tất cả chuyên gia có dữ liệu chứa từ khóa tìm kiếm.
			</p>
			<p>
			    <img
			        src="storage/app/public/media/huong-dan/G3.jpg"
			    />
			</p>
			<p>
			    …..
			</p>
			<p>
			    <a name="_Toc478236649">
			        <strong>2.3</strong>
			        <strong>Tìm kiếm trên bộ lọc từng mục</strong>
			    </a>
			    <strong></strong>
			</p>
			<p>
			    Mỗi mục (ví dụ chuyên gia, doanh nghiệp…) đề được xây dựng bộ lọc tìm kiếm
			    riêng, phục vụ tìm kiếm nhanh và đúng trọng tâm.
			</p>
			<p>
			    Có thể click chọn tên mục trên danh sách các mục tìm kiếm để chuyển sang
			    tìm kiếm theo mục tương ứng
			</p>
			<p>
			    <a name="_Toc478236650">
			        <strong>2.3.1 </strong>
			        <strong>Bộ lọc Chuyên gia KH&amp;CN</strong>
			    </a>
			    <strong></strong>
			</p>
			<p>
			    Các bước thực hiện
			</p>
			<p>
			    B1: Nhập từ khóa cần tìm vào khung nhập của thanh tìm kiếm
			</p>
			<p>
			    B2: Tùy chỉnh bộ lọc theo mục đích tìm kiếm (có thể chọn lọc cùng lúc nhiều
			    tiêu chí)
			</p>
			<p>
			    B3: Click tìm kiếm dữ liệu hoặc nhấn enter để bắt đầu tìm kiếm
			</p>
			<p>
			    o Bộ lọc chuyên gia KH&amp;CN gồm:
			</p>
			<p>
			    § lọc theo thông tin chứa từ khóa( Tìm theo)
			</p>
			<p>
			    § lọc theo tỉnh, thành phố
			</p>
			<p>
			    § lọc theo chức danh( học vị)
			</p>
			<p>
			    Bộ lọc nào được chọn, hệ thống sẽ lọc theo tiêu chí đó.
			</p>
			<p>
			    <img		        
			        src="storage/app/public/media/huong-dan/G4.jpg"
			    />
			</p>
			<p>
			    Kết quả: Ví dụ, bạn lọc tìm kiếm với từ khóa Nguyễn, chọn tìm theo &gt; tên
			    nhà KH, tỉnh, thành phố &gt; Đà Nẵng, Chức danh &gt; TS
			</p>
			<p>
			    Hệ thống sẽ trả về danh sách tất cả chuyên gia có tên chứa từ “Nguyễn”,
			    đang ở Đà Nẵng và có chức danh là TS( tiến sĩ) như dưới đây:
			</p>
			<p>
			    <img			  
			        src="storage/app/public/media/huong-dan/G5.jpg"
			    />
			</p>
			<p>
			    <a name="_Toc478236651">
			        <strong>2.3.2 </strong>
			        <strong>Bộ lọc Đề tài, dự án các cấp</strong>
			    </a>
			    <strong></strong>
			</p>
			<p>
			    Các bước thực hiện:
			</p>
			<p>
			    B1: Nhập từ khóa cần tìm vào khung nhập của thanh tìm kiếm
			</p>
			<p>
			    B2: Tùy chỉnh bộ lọc theo mục đích tìm kiếm (có thể chọn lọc cùng lúc nhiều
			    tiêu chí)
			</p>
			<p>
			    B3: Click tìm kiếm dữ liệu hoặc nhấn enter để bắt đầu tìm kiếm
			</p>
			<p>
			    o Bộ lọc đề tài, dự án các cấp gồm:
			</p>
			<p>
			    § lọc theo thông tin chứa từ khóa( Tìm theo)
			</p>
			<p>
			    § lọc theo chuyên ngành
			</p>
			<p>
			    Bộ lọc nào được chọn, hệ thống sẽ lọc theo tiêu chí đó.
			</p>
			<p>
			    <img			        
			        src="storage/app/public/media/huong-dan/G6.jpg"
			    />
			</p>
			<p>
			    Kết quả: Ví dụ, bạn lọc tìm kiếm với từ khóa thực phẩm, chọn tìm theo &gt;
			    tên đề tài, dự án, chuyên ngành &gt; Công nghệ sinh học trong nông nghiệp
			</p>
			<p>
			    Hệ thống sẽ trả về danh sách tất cả đề tài dự án có tên chứa từ “thực
			    phẩm”, thuộc chuyên ngành Công nghệ sinh học trong nông nghiệp như dưới
			    đây:
			</p>
			<p>
			    <img			       
			        src="storage/app/public/media/huong-dan/G7.jpg"
			    />
			</p>
			<p>
			    <a name="_Toc478236652">
			        <strong>2.3.3 </strong>
			        <strong>Bộ lọc Bằng phát minh,sáng chế</strong>
			    </a>
			    <strong></strong>
			</p>
			<p>
			    Các bước thực hiện:
			</p>
			<p>
			    B1: Nhập từ khóa cần tìm vào khung nhập của thanh tìm kiếm
			</p>
			<p>
			    B2: Tùy chỉnh bộ lọc theo mục đích tìm kiếm (có thể chọn lọc cùng lúc nhiều
			    tiêu chí)
			</p>
			<p>
			    B3: Click tìm kiếm dữ liệu hoặc nhấn enter để bắt đầu tìm kiếm
			</p>
			<p>
			    o Bộ lọc bằng phát minh, sáng chế gồm:
			</p>
			<p>
			    § lọc theo thông tin chứa từ khóa( Tìm theo)
			</p>
			<p>
			    § lọc theo lĩnh vực KH&amp;CN
			</p>
			<p>
			    § Loại
			</p>
			<p>
			    Bộ lọc nào được chọn, hệ thống sẽ lọc theo tiêu chí đó.
			</p>
			<p>
			    <img		        
			        src="storage/app/public/media/huong-dan/G8.jpg"
			    />
			</p>
			<p>
			    Kết quả: Ví dụ, bạn lọc tìm kiếm với từ khóa thực phẩm, chọn tìm theo
			    &gt;tên bằng phát minh, sáng chế, chuyên ngành &gt; Công nghệ thông tin và
			    truyền thông, loại &gt; Giải pháp hữu ích
			</p>
			<p>
			    Hệ thống sẽ trả về danh sách tất cả bằng phát minh sáng chế có tên chứa từ
			    “điện”, thuộc chuyên ngành Công nghệ thông tin và truyền thông, thuộc loại
			    giải pháp hữu ích như dưới đây:
			</p>
			<p>
			    <img			        
			        src="storage/app/public/media/huong-dan/G9.jpg"
			    />
			</p>
			<p>
			    <a name="_Toc478236653">
			        <strong>2.3.4 </strong>
			        <strong>Bộ lọc Sản phẩm, công nghệ mới</strong>
			    </a>
			    <strong></strong>
			</p>
			<p>
			    Các bước thực hiện:
			</p>
			<p>
			    B1: Nhập từ khóa cần tìm vào khung nhập của thanh tìm kiếm
			</p>
			<p>
			    B2: Tùy chỉnh bộ lọc theo mục đích tìm kiếm (có thể chọn lọc cùng lúc nhiều
			    tiêu chí)
			</p>
			<p>
			    B3: Click tìm kiếm dữ liệu hoặc nhấn enter để bắt đầu tìm kiếm
			</p>
			<p>
			    o Bộ lọc sản phẩm,công nghệ mới gồm:
			</p>
			<p>
			    § lọc theo thông tin chứa từ khóa( Tìm theo)
			</p>
			<p>
			    § lọc theo lĩnh vực KH&amp;CN
			</p>
			<p>
			    Bộ lọc nào được chọn, hệ thống sẽ lọc theo tiêu chí đó.
			</p>
			<p>
			    <img			        
			        src="storage/app/public/media/huong-dan/G10.jpg"
			    />
			</p>
			<p>
			    Kết quả: Ví dụ, bạn lọc tìm kiếm với từ khóa vật liệu, chọn tìm theo
			    &gt;khả năng ứng dụng
			</p>
			<p>
			    Hệ thống sẽ trả về danh sách tất cả sản phẩm, công nghệ mới có khả năng ứng
			    dụng chứa từ “vật liệu” như dưới đây:
			</p>
			<p>
			    <img			        
			        src="storage/app/public/media/huong-dan/G11.jpg"
			    />
			</p>
			<p>
			    <a name="_Toc478236654">
			        <strong>2.3.5 </strong>
			        <strong>Bộ lọc Doanh nghiệp KH&amp;CN</strong>
			    </a>
			    <strong></strong>
			</p>
			<p>
			    Các bước thực hiện:
			</p>
			<p>
			    B1: Nhập từ khóa cần tìm vào khung nhập của thanh tìm kiếm
			</p>
			<p>
			    B2: Tùy chỉnh bộ lọc theo mục đích tìm kiếm (có thể chọn lọc cùng lúc nhiều
			    tiêu chí)
			</p>
			<p>
			    B3: Click tìm kiếm dữ liệu hoặc nhấn enter để bắt đầu tìm kiếm
			</p>
			<p>
			    o Bộ lọc doanh nghiệp KH&amp;CN gồm:
			</p>
			<p>
			    § lọc theo thông tin chứa từ khóa( Tìm theo)
			</p>
			<p>
			    § lọc theo lĩnh vực KH&amp;CN
			</p>
			<p>
			    § lọc theo Tỉnh, thành phố
			</p>
			<p>
			    § Xếp hạng
			</p>
			<p>
			    Bộ lọc nào được chọn, hệ thống sẽ lọc theo tiêu chí đó.
			</p>
			<p>
			    <img			       
			        src="storage/app/public/media/huong-dan/G12.jpg"
			    />
			</p>
			<p>
			    Kết quả: Ví dụ, bạn lọc tìm kiếm với từ khóa “dược phẩm”, chọn tìm theo
			    &gt;tên doanh nghiệp, Tỉnh, thành phố &gt; Bắc Ninh
			</p>
			<p>
			    Hệ thống sẽ trả về danh sách tất cả doanh nghiệp KH&amp;CN tên chứa từ
			    “dược phẩm” tại Bắc Ninh như sau:
			    <img			       
			        src="storage/app/public/media/huong-dan/G13.jpg"
			    />
			</p>



		</div>

		<!---phan footer-->
			
		<div class="row div-footer">
			<div class="container">
				<div class="col-md-4 display-block">
					<p>Trung tâm ươm tạo Công nghệ và Doanh nghiệp Khoa học Công nghệ- Viện ứng dụng công nghệ</p>
      				<p><i class="fa fa-map-pin"></i> Địa chỉ  :25-Lê Thánh Tông-Hoàn Kiếm-Hà Nội</p>
        			<p><i class="fa fa-phone"></i> Hotline  :0439336570</p>
       				<p><i class="fa fa-envelope"></i> E-mail :info@ntbic.com</p>
        
				</div>
				<div class="col-md-3 display-block">
					<ul>
						<li><a href="#">	Dữ liệu chuyên gia KH&CN</a></li>
						<li><a href="#">	Dữ liệu đề tài, dự án KH&CN các cấp</a></li>
						<li><a href="#">	Dữ liệu phát minh, sáng chế, giải pháp</a></li>
						<li><a href="#">	Dữ liệu sản phẩm, công nghệ mới</a></li>
						<li><a href="#">	Dữ liệu doanh nghiệp KH&CN</a></li>
					</ul>
				</div>
				<div class="col-md-3 display-block">
					<li><a href="#">	Văn phòng đại diện tại nước ngoài</a></li>
					<li><a href="#">	Hướng dẫn sử dụng</a></li>
					<li><a href="#">	Giới thiệu về NTBIC</a></li>
				</div>
				<div class="col-md-2 display-block">
					 <div class="social-icons">
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
</body>
</html>
