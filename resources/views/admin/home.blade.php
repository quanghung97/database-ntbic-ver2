@extends('layouts.admin_dashboard')
@section('sidebar')
	<li id="active_tong_quan" class="@yield('is_active_home')"><a href="{{ URL::asset('admin') }}"> <i class="icon-custom-home"></i> <span
                    class="title">Tổng quan</span></span> </a>

    </li>
    <li id="active_quan_ly_user" class="@yield('is_active_userpage')"><a href="{{ URL::asset('admin/quan-ly-nguoi-dung') }}"> <i class="fa fa-user"></i> <span class="title">Quản lý người dùng</span></a>
    </li>

    <li class="" id="sub_menu_quan_ly_database"><a href="javascript:;"> <i class="fa fa-group"></i>  <span
                    class="title">Quản lý dữ liệu</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
            <li  class="" id="active_chuyen_gia"><a href="{{ URL::asset('admin/quan-ly-du-lieu/chuyen-gia') }}"> Chuyên gia KH&CN</a></li>
            <li id="active_san_pham"><a href="{{ URL::asset('admin/quan-ly-du-lieu/san-pham') }}"> Sản phẩm KH&CN</a></li>
            <li id="active_doanh_nghiep"><a href="{{ URL::asset('admin/quan-ly-du-lieu/doanh-nghiep') }}"> Doanh nghiệp KH&CN</a></li>
            <li id="active_phat_minh"><a href="{{ URL::asset('admin/quan-ly-du-lieu/phat-minh') }}"> Phát minh sáng chế</a></li>
            <li id="active_de_tai"><a href="{{ URL::asset('admin/quan-ly-du-lieu/de-tai-du-an-cac-cap') }}"> Đề tài, dự án các cấp</a></li>
            
        </ul>
    </li>
@endsection