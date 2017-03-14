@extends('layouts.admin_dashboard')
@section('sidebar')
	<li class="active"><a href="/"> <i class="icon-custom-home"></i> <span
                    class="title">Tổng quan</span></span> </a>

    </li>

    <li class=""><a href="{{ URL::asset('quan-tri-vien/quan-ly-nguoi-dung') }}"> <i class="fa fa-user"></i> <span class="title">Quản lý người dùng</span></a>
    </li>
    <li class=""><a href="javascript:;"> <i class="fa fa-group"></i>  <span
                    class="title">Quản lý dữ liệu</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
            <li><a href="{{ URL::asset('quan-tri-vien/quan-ly-du-lieu/chuyen-gia') }}"> Chuyên gia KH&CN</a></li>
            <li><a href="{{ URL::asset('quan-tri-vien/quan-ly-du-lieu/san-pham') }}"> Sản phẩm KH&CN</a></li>
            <li><a href="{{ URL::asset('quan-tri-vien/quan-ly-du-lieu/doanh-nghiep') }}"> Doanh nghiệp KH&CN</a></li>
            <li><a href="{{ URL::asset('quan-tri-vien/quan-ly-du-lieu/phat-minh') }}"> Phát minh sáng chế</a></li>
            <li><a href="{{ URL::asset('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap') }}"> Đề tài dự án các cấp</a></li>
            
        </ul>
    </li>
@endsection