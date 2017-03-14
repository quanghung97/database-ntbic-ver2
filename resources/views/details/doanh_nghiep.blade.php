@extends('layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/details_chuyen_gia.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_doanh_nghiep.css') }}">
@endsection
<!-- main-content -->
@section("content")

<div class="row col-md-12 filter-row">
                <div class="filter">
                    <ul class="list-search-filter">
                        <li>
                            <select name='tim_theo'>
                              <option value="0">Tìm theo</option>
                              <option value="1">Tên doanh nghiệp</option>
                              <option value="2">Sản phẩm KHCN</option>
                              <option value="3">Công nghệ nổi bật</option>
                              <option value="4">Hướng nghiên cứu</option>
                            </select>
                        </li>
                        <li>
                            <select name='linh_vuc_khcn'>
                              <option value="0">Lĩnh vực KH&CN</option>
                              @foreach($linh_vuc as $lv)
                              <option value="{{$lv->id}}">{{$lv->linh_vuc}}</option>
                              @endforeach
                            </select>
                        </li>
                        <li>
                            <select name='tinh_thanh_pho'>
                              <option value="0">Tỉnh, thành phố</option>
                              @foreach($tinh_thanh as $tinh)
                              <option value="{{$tinh->id}}">{{$tinh->tinh_thanh_pho}}</option>
                              @endforeach
                            </select>
                        </li>
                        <li>
                            <select name='xep_hang'>
                              <option value="0">Xếp hạng</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                            </select>
                        </li>
                    </ul>
                </div>
    </div>
<div class="row">
<div class="col-md-12">
    <button id="back_page" type="button" class="btn btn-primary"><b><span class="glyphicon glyphicon-arrow-left
"></span> Quay lại</b></button>
  </div>
<div class="content_view col-md-12 div_main_content">

	<table  class="archives_list">

        <tbody>

            <tr>

                <td width="120px">

                	<img src="{{ URL::asset($datas->logo) }}" style="width:120px;">

                </td>

                <td>

                	<h3 style="">{{ $datas->ten_doanh_nghiep }}</h1>

                    <p style="line-height:20px;">

                        <span >

                            Loại, lĩnh vực: <a href="#"><span>{{ $datas->linh_vuc }}</span></a><br>

                        </span>

                        <span >

                        	Tỉnh thành: <a href="#"><span ">{{ $datas->tinh_thanh_pho }}</span></a><br>

                        </span>

                        <span>

                        	Cập nhât: {{ $datas->ngay_cap_nhat }}

                        </span>

                        <p align="right">
    						  <a href="#"><i class="glyphicon glyphicon-print"></i> In bài viết</a>
  					  </p>

                    </p>

                </td>

            </tr>

        </tbody>

    </table>

    <p ><strong>I. Thông tin chung</strong></p>

    <table  class="archives_list">

        <tbody>

            <tr>

                <td width="200px">Tên doanh nghiệp KH&CN</td>

                <td>

                	{{ $datas->ten_doanh_nghiep }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Cập nhât thông tin</td>

                <td>

                	{{ $datas->ngay_cap_nhat }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Lĩnh vực KH&CN: </td>

                <td>

                	<a href="">{{ $datas->linh_vuc }}</span></a>

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Tỉnh/thành phố</td>

                <td>

					<a href="">{{ $datas->tinh_thanh_pho }}</span></a>     

                	

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Địa chỉ trụ sở chính </td>

                <td>

                {!! $datas->dia_chi !!}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Email</td>

                <td>

                    <a href="">{{ $datas->email }}</a>

               </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Phone</td>

                <td>

                    {{ $datas->phone }}

               </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Fax</td>

                <td>

                    {{ $datas->fax }}

               </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>Website</td>

                <td>

                    {{ $datas->website }}

               </td>

            </tr>

        </tbody>

    </table>    

    <table  class="archives_list">

        <tbody>

            <tr>

                <td width="200">

                    <strong>Mã số doanh nghiệp:</strong>

                </td>
                {{ $datas->ma_so_doanh_nghiep }}
                <td>
                    <em>(Số Giấy chứng nhận đăng ký kinh doanh/ Số quyết định thành lập)</em>

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Mã số thuế

                </td>

                <td>

                    {{ $datas->ma_so_thue }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Loại hình 

                </td>

                <td>

                    {{ $datas->loai_hinh }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Ngày đăng ký thành lập

                </td>

                <td>

                   {{ $datas->ngay_dang_ky }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Tên người đại diện theo pháp luật

                </td>

                <td>

                    {{ $datas->ten_dai_dien }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td >

                    {{ $datas->phone_dai_dien }}

                </td>

                <td>

                   

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td >

                    {{ $datas->email_dai_dien }}

                </td>

                <td>

                    <a href="#"></a>

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td >

                    Địa chỉ

                </td>

                <td>

                    {{ $datas->dia_chi_dai_dien }}

                </td>

            </tr>

        </tbody>

    </table>

    <p ><strong>II. Ngành nghề kinh doanh chính</strong></p>

    <table  class="archives_list">    

        <tbody>

            <tr>

                <td width="200">

                    <strong>Ngành nghề kinh doanh chính</strong>

                </td>

                <td>

                    {{ $datas->nganh_nghe_kinh_doanh }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Thông tin đăng ký thuế

                </td>

                <td>

                    {{ $datas->thong_tin_thue }}

                </td>

            </tr>

        </tbody>

    </table>

    <p ><strong>III. Các chi nhánh của Doanh nghiệp</strong></p>

    <table class="archives_list">    

        <tbody>

            <tr>

                <td>

                    {!! $datas->chi_nhanh !!}

                </td>

            </tr>

        </tbody>

    </table>

    <p ><strong>IV. Các văn phòng đại diện của doanh nghiệp</strong></p>

    <table  class="archives_list">

        <tbody>

            <tr>

                <td>

                   {!! $datas->van_phong_dai_dien !!}

                </td>

            </tr>

        </tbody>

    </table>

    <p ><strong>V. Thông tin về KH&CN</strong></p>

    <table  class="archives_list">

        <tbody>

            <tr>

                <td colspan="2">

                    Đăng ký, Chứng nhận DN, tổ chức KH&CN

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td  width="200">

                    Số quyết định

                </td>

                <td>

                    {{ $datas->so_quyet_dinh_khcn }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td >

                    Thời gian đăng ký:

                </td>

                <td>

                    {{ $datas->thoi_gian_dang_ky_khcn }}

                </td>

            </tr>

       	</tbody>

        <tbody>

            <tr>

                <td >

                    Nơi cấp:

                </td>

                <td>

                    {{ $datas->noi_cap_chung_nhan_khcn }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Sếp hạng trình độ công nghệ

                </td>

                <td>

                        {{ $datas->xep_hang_trinh_do_khcn }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Hướng nghiên cứu KH&CN

                </td>

                <td>

                    {{ $datas->huong_nghien_cuu_khcn }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Số lượng cán bộ nghiên cứu khoa học

                </td>

                <td>

                    {{ $datas->so_luong_can_bo_khcn }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Công nghệ nổi bật

                </td>

                <td>

                    {{ $datas->cong_nghe_noi_bat }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Sử dụng công nghệ

                </td>

                <td>

                    {{ $datas->su_dung_cong_nghe }}

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Chuyển giao KH&CN?

                </td>

                <td>

                   <input type="radio" name="tech_transfer" value="0" disabled="" checked=""> Không có CN muốn chuyển giao<br>

                   <input type="radio" name="tech_transfer" value="1" disabled=""> Có CN muốn chuyển giao <br>

                   <input type="radio" name="tech_transfer" value="2" disabled=""> Muốn mua công nghệ để phát triển năng lực sản xuất và kinh doanh

                </td>

            </tr>

        </tbody>

    </table>

    <p ><strong>VI. Kết quả KH&CN thuộc quyền sở hữu hợp pháp</strong></p>

    <table summary="" class="archives_list">

        <tbody>

            <tr>

                <td>

                    {{ $datas->so_huu_hop_phap }}

                </td>

            </tr>

        </tbody>

    </table>

    <p><strong>VII. Danh mục các sản phẩm hàng hóa hình thành từ kết quả KH&CN</strong></p>

    <table class="archives_list">

        <tbody>

            <tr>

                <td>

                    {!! $datas->san_pham_khcn !!}

                </td>

            </tr>

        </tbody>

    </table>

    <table  class="archives_list">

        <tbody>

            <tr>

                <td width="200px">

                    Xem bản đồ

                </td>

                <td>

                    <a target="_blank" class="googlelink" href="#">Xem bản đồ chi tiết</a>

                </td>

            </tr>

        </tbody>

        <tbody>

            <tr>

                <td>

                    Chia sẻ doanh nghiệp

                </td>

                <td>

                    <a href="#" title="" target="_blank"><img src="" width="30"></a>

                   

                </td>

            </tr>
            <tr>
            <td colspan=3>
           <strong>Từ khóa: </strong><a href="#">Ntbic</a>
                    <p align="right">
            </td>
          
        </tr>
        <tr>
            <td colspan=3>
                <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                <i class="fa fa-pinterest-square fa-3x" aria-hidden="true"></i>
                <i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
            </p>
            <p align="right">
                        <a href="#"><i class="glyphicon glyphicon-print"></i> In bài viết</a>
            </p>
            </td>
        </tr>
        <tr>
            <td colspan=3 >
                <strong>
                   Các đề tài dự án khác
                </strong><br>
                <ul >
       {{--              <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Trang chủ</a></li> --}}
                <ul>

            </td>

        </tr>

        </tbody>

    </table>

</div>

{{-- @include('details.sidebar') --}}
</div>
@endsection
<!-- end main-content -->
@section('script')
<script type="text/javascript">
    window.onload = function() {
        document.getElementById('search_form').setAttribute('action','/doanh-nghiep');
    }
</script>
@endsection