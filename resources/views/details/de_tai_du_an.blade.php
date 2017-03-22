@extends('layouts.master')
@section('style')
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/details_de_tai_du_an_cac_cap.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/sidebar.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_de_tai.css') }}">
@endsection
<!-- main-content -->
@section("content")
    <div class="row col-md-12 filter-row">
                <div class="filter">
                    <ul class="list-search-filter">
                        <li>
                            <select name="tim_theo">    
                               <option value="0" selected="">Tìm theo</option>
                               <option value="0" selected="">Tìm theo</option>
                               <option value="0" selected="">Tìm theo</option>
                               <option value="0" selected="">Tìm theo</option>
                               <option value="0" selected="">Tìm theo</option>
                            </select>
                        </li>
                        <li>
                            <select name="cap_quan_ly">
                              <option value="">Chuyên ngành</option>
                              <option value="">A</option>
                              <option value="">B</option>
                              <option value="">D</option>
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
    <div class="articles_detail col-md-12">

    <h2 class="title_pages">Tên đề tài</h2>

    <p class="time">Cập nhật Thứ năm - 08/09/2016  16:15 

    <a class="print" href="#" target="_blank">

                <i class="glyphicon glyphicon-print"></i>

                In bài viết

    </a>

    </p>

    <table class="archives_list">

        <tbody>
        <tr>

            <td width="30" align="center">

                <strong>1.</strong>

            </td>

            <td width="150"><strong>Tên báo cáo:</strong></td>

            <td>

              Đây là tên báo cáo

            </td>

        </tr>

        <tr>

            <td align="center">

                <strong>2.</strong>

            </td>

            <td><strong>Mã số đề tài</strong></td>

            <td>

                Đây là mã số đề tài

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>3.</strong>

            </td>

            <td><strong>Tỉnh, thành phố</strong></td>

            <td>

                    Đây là tỉnh, thành phố

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>4.</strong>

            </td>

            <td><strong>Cơ quan chủ trì</strong></td>

            <td>

                Đây là cơ quan chủ trì

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>5.</strong>

            </td>

            <td><strong>Cấp quản lý đề tài</strong></td>

            <td>

                    Cấp quản lý đề tài

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>6.</strong>

            </td>

            <td><strong>Cơ quan quản lý đề tài</strong></td>

            <td>

                Cơ quan quản lý đề tài

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>7.</strong>

            </td>

            <td><strong>Lĩnh vực nghiên cứu</strong></td>
            <td>
                    Lĩnh vực nghiên cứu

            </td>

          </tr>

       <tr>

            <td align="center">

                <strong>8.</strong>

            </td>

            <td><strong>Thời gian bắt đầu </strong></td>
            <td>
                    Thời gian bắt đầu

            </td>

          </tr>
          <tr>

            <td align="center">

                <strong>9.</strong>

            </td>

            <td><strong>Thời gian kết thúc</strong></td>
            <td>
                    Thời gian kết thúc

            </td>

          </tr>
          <tr>

            <td align="center">

                <strong>10.</strong>

            </td>

            <td><strong>Trạng thái</strong></td>
            <td>
                        Đây là trạng thái

            </td>

          </tr>
          <tr>
            

            <td colspan="3"><strong>11. Tóm tắt nội dung</strong><br>

             Tóm tắt ở đây
            </td>
        </tr>
        <tr>
            

            <td colspan="3"><strong>12. Kinh phí</strong><br>

                Kinh phí
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
   {{--  @include('details.sidebar') --}}
</div>

@endsection
<!-- end main-content -->
@section('script')
<script type="text/javascript">
    window.onload = function() {
        document.getElementById('search_form').setAttribute('action','/de-tai-du-an-cac-cap');
    }
</script>
@endsection