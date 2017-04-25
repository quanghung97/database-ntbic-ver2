<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    @yield('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/master.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('public/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/footer_home.css') }}">
@yield('javascript')
<!-- end style -->
</head>
<body>
<div class="app">
    <nav class="navbar page-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle menu-hidden-btn" data-toggle="collapse"
                        data-target="#myNavbar">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::asset('/') }}"><span class="logo">NTBIC</span></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('huong-dan-su-dung')}}" target="_blank">Hướng dẫn sử dụng</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar top -->

    <div class="container">
        <!-- search box -->
        <!-- <div class="search-label">
            NGÂN HÀNG THÔNG TIN KHOA HỌC
        </div> -->
        <form class="search-form" id="search_form" method="GET" action="">
            <div class="search-area col-md-9">

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." name="text_search"
                           value="@if(isset($text_search)){{$text_search}}@endif">
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
            <div class="col-md-4 display-block">
                <p>Trung tâm Ươm tạo Công nghệ và Doanh nghiệp Khoa học Công nghệ- Viện Ứng dụng Công nghệ</p>
                <p><i class="fa fa-map-pin"></i> Địa chỉ: 25 Lê Thánh Tông, Hoàn Kiếm, Hà Nội</p>
                <p><i class="fa fa-phone"></i> Hotline: 0439336570</p>
                <p><i class="fa fa-envelope"></i> E-mail: info@ntbic.com</p>

            </div>
            <div class="col-md-3 display-block">
                <ul>
                    <li><a href="{!! url('chuyen-gia') !!}"> Dữ liệu chuyên gia KH&CN</a></li>
                    <li><a href="{!! url('de-tai-du-an-cac-cap') !!}"> Dữ liệu đề tài, dự án các cấp</a></li>
                    <li><a href="{!! url('phat-minh') !!}"> Dữ liệu bằng phát minh, sáng chế</a></li>
                    <li><a href="{!! url('san-pham') !!}"> Dữ liệu sản phẩm, công nghệ mới</a></li>
                    <li><a href="{!! url('doanh-nghiep') !!}"> Dữ liệu doanh nghiệp KH&CN</a></li>
                </ul>
            </div>
            <div class="col-md-3 display-block">
                <li><a href="{{url('huong-dan-su-dung')}}"> Hướng dẫn sử dụng</a></li>
                <li><a href="http://ntbic.com/"> Giới thiệu về NTBIC</a></li>
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
                <p>Copyright © 2016 <a href="http://csdl.ntbic.com/">csdl.ntbic.com</a></p>
            </div>
            <div class="col-md-6">
                <ul class="bottom_ul">
                    <li>
                        <a href="https://www.google.com/maps/place/Vi%E1%BB%87n+%E1%BB%A8ng+D%E1%BB%A5ng+C%C3%B4ng+Ngh%E1%BB%87/@21.006394,105.8129819,14z/data=!4m8!1m2!2m1!1zVHJ1bmcgdMOibSDGr8ahbSB04bqhbyBDw7RuZyBuZ2jhu4cgdsOgIERvYW5oIG5naGnhu4dwIEtob2EgaOG7jWMgQ8O0bmcgbmdo4buHLSBWaeG7h24g4buobmcgZOG7pW5nIEPDtG5nIG5naOG7hw!3m4!1s0x3135abee0f48e19b:0x23d765710433152b!8m2!3d21.0198013!4d105.8586952">Site
                            Map</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- script -->


<script src="{{ URL::asset('public/js/jquery-3.1.1.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('public/js/jquery.cookie.js') }}"></script>
<script src="{{ URL::asset('public/js/my_script.js') }}"></script>
<script src="{{ URL::asset('public/js/printThis.js') }}"></script>
<script type="text/javascript">
    function inbaiviet() {
        $("#contentInvoice").printThis();
    }
</script>
<script>
    function inbaiviet1() {
        window.print();
    }
</script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@yield('script')
</body>
</html>