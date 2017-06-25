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
                    </ul>
                </div>
    </div>
    
<div class="row">
    <div class="col-md-12">
        <button id="back_page" type="button" class="btn btn-primary"><b><span class="glyphicon glyphicon-arrow-left
    "></span> Quay lại</b></button>
  </div>
    <div class="articles_detail col-md-12" id="contentInvoice" >

    <h2 class="title_pages">Nhan đề</h2>

    <p class="time">Cập nhật Thứ năm - 08/09/2016  16:15 

    <a  href="#"  onclick="inbaiviet()">

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

            <td width="150"><strong>Nhan đề:</strong></td>

            <td>

              Đây là Nhan đề

            </td>

        </tr>

        <tr>

            <td align="center">

                <strong>2.</strong>

            </td>

            <td><strong>Tác giả</strong></td>

            <td>

                Đây là tác giả

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>3.</strong>

            </td>

            <td><strong>Dạng tài liệu</strong></td>

            <td>

                    Đây là dạng tài liệu

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>4.</strong>

            </td>

            <td><strong>Nguồn trích</strong></td>

            <td>

                Đây là nguồn trích

            </td>

          </tr>

           <tr>

            <td align="center">

                <strong>5.</strong>

            </td>

            <td><strong>Năm xuất bản</strong></td>

            <td>

                 Năm xuất bản

            </td>

          </tr>

          <tr>

            <td align="center">

                <strong>6.</strong>

            </td>

            <td><strong>Kí hiệu kho</strong></td>

            <td>

                     Viết kí hiệu kho vào đây
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
            

            <td colspan="3"><strong>8. Từ khóa</strong><br>

                Viết từ khóa ở đây
            </td>
        </tr>
        <tr>
            

            <td colspan="3"><strong>9. Tóm tắt</strong><br>

                  Viết tóm tắt ở đây
            </td>
        </tr>
        
         </tbody>
    </table> 
    </div>
    <div class=" col-md-12 share">
        <div id="fb-root"></div>
        <div style="float: left;"><a href="#"><div class="fb-share-button" 
        data-href="#" data-size="large" data-layout="button_count"></div></a></div>
        <div style="float:right;">
            <a href="#" onclick="inbaiviet()"><i class="glyphicon glyphicon-print"></i> In bài viết</a>
        </div>
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