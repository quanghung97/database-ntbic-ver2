@extends('layouts.master')
@section('style')
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/details_de_tai_du_an_cac_cap.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/sidebar.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_san_pham.css') }}">
@endsection
<!-- main-content -->
@section("content")

<div class="row col-md-12 filter-row">
                <div class="filter">
                    <ul class="list-search-filter">
                        <li>
                            <select name='tim_theo'>
                              <option value="0">Tìm theo</option>
                              <option value="1">Tên sản phẩm, ứng dụng</option>
                              <option value="2">Khả năng ứng dụng</option>
                              <option value="3">Mô tả sản phẩm, ứng dụng</option>
                              <option value="4">Giải quyết bài toán</option>
                              <option value="5">Thị trường ứng dụng</option>
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
                    </ul>
                </div>
    </div>
<div class="row">
<div class="col-md-12">
    <button id="back_page" type="button" class="btn btn-primary"><b><span class="glyphicon glyphicon-arrow-left
"></span> Quay lại</b></button>
  </div>
 <div class="articles_detail col-md-12" id="contentInvoice">

    <h2 class="title_pages">{{ $datas->ten_san_pham }}</h2>

    <p class="time">Cập nhật Thứ năm - 08/09/2016  16:15 

    <a  href="#"  onclick="inbaiviet()">

                <i class="glyphicon glyphicon-print"></i>

                In bài viết

    </a>

    </p>

    <table class="archives_list">

        <tbody>
        <tr>

           
            <td>
                <strong>1. Tên sản phẩm KH&CN</strong><br>
                 {{ $datas->ten_san_pham }}


            </td>


        </tr>

        <tr>

            

            <td>
                <strong>2.Thuộc lĩnh vực KH&CN</strong><br>
                   {{ $datas->linh_vuc }}

            </td>

           

          </tr>


          <tr>

           

            <td colspan="3"><strong>3. Điểm nổi bật</strong><br>

            {!! $datas->dac_diem_noi_bat !!}
            </td>


        </tr>
        <tr>
           

            <td colspan="3"><strong>4. Mô tả chung về sản phẩm KH&CN</strong><br>

            {!! str_replace('/storage/app/public/',URL::asset('').'/storage/app/public/', $datas->mo_ta_chung) !!}
            </td>


        </tr>
        <tr>
            

            <td colspan="3"><strong>5. Mô tả về quy trình chuyển giao</strong><br>

            {!! $datas->quy_trinh_chuyen_giao !!}
            </td>
        </tr>
        <tr>
           


            <td colspan="3"><strong>6. Khả năng ứng dụng</strong><br>

            {!! $datas->kha_nang_ung_dung !!}
            </td>
        </tr>
         
         </tbody>
    </table> 
    </div>
    <div class=" col-md-12 share">
        <div id="fb-root"></div>
        <div style="float: left;"><a href="#"><div class="fb-share-button" 
        data-href="{{ URL::asset('san-pham/'.$datas->link) }}" data-size="large" data-layout="button_count"></div></a></div>
        <div style="float:right;">
            <a href="#" onclick="inbaiviet()"><i class="glyphicon glyphicon-print"></i> In bài viết</a>
        </div>
    </div>  

</div>

    
   

@endsection
@section('script')
<script type="text/javascript">
    window.onload = function() {
        document.getElementById('search_form').setAttribute('action','/san-pham');
    }
</script>
@endsection