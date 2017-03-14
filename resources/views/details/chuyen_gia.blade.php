@extends('layouts.master')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/details_chuyen_gia.css') }} ">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/sidebar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_chuyen_gia.css') }}">
@endsection
<!-- main-content -->

@section("content")
<div class="row col-md-12 filter-row ">
        <div class="filter">
          <ul class="list-search-filter">
            <li>
              <select class="select-style" name = 'tim_theo'>
                @if($tim_theo == '0')
                    <option value="0" selected="">Tìm theo</option>
                  @else
                    <option value="0">Tìm theo</option>
                  @endif

                  @if($tim_theo == '1')
                    <option value="1" selected="">Tên nhà KH</option>
                  @else
                    <option value="1">Tên nhà KH</option>
                  @endif

                  @if($tim_theo == '2')
                    <option value="2" selected="">Lĩnh vực nghiên cứu</option>
                  @else
                    <option value="2">Lĩnh vực nghiên cứu</option>
                  @endif

                  @if($tim_theo == '3')
                    <option value="3" selected="">Hướng nghiên cứu</option>
                  @else
                    <option value="3">Hướng nghiên cứu</option>
                  @endif

                  @if($tim_theo == '4')
                    <option value="4" selected="">Cơ quan công tác</option>
                  @else
                    <option value="4">Cơ quan công tác</option>
                  @endif
              </select>
            </li>
            <li>
              <select class="select-style" name='tinh_thanh_pho'>
                <option value="">Tỉnh, thành phố</option>
                @foreach($tinh_thanh as $tt)
                  @if($tinh_thanh_current == $tt->tinh_thanh_pho)
                    <option value="{{$tt->tinh_thanh_pho}}" selected="">{{$tt->tinh_thanh_pho}}</option>
                  @else 
                    <option value="{{$tt->tinh_thanh_pho}}">{{$tt->tinh_thanh_pho}}</option>
                  @endif
                @endforeach
              </select>
            </li>
            <li>
              <select class="select-style" name="chuc_danh">
                <option value="">Chức danh</option>
                @foreach($hoc_vi as $hv)
                  @if($hoc_vi_current == $hv->hoc_vi)
                    <option value="{{$hv->hoc_vi}}" selected="">{{$hv->hoc_vi}}</option>
                  @else
                    <option value="{{$hv->hoc_vi}}">{{$hv->hoc_vi}}</option>
                  @endif
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
	<div class="profiles_view col-md-12">

    <table class="archives_list">
      <tbody>
         <tr>
            <td width="120" align="center">

              <img src="{{ URL::asset($datas->link_anh) }}" title="" class="bor">

            </td>
            <td>

              <strong>{{ $datas->ho_va_ten }}</strong>&nbsp;&nbsp;&nbsp;Sinh ngày: {{ $datas->nam_sinh }}<br>
              Số công trình, bài báo, sách đã công bố: {{ $datas->Sl_congTrinh_baiBao }}<br>
              <a href="#"><i class="glyphicon glyphicon-print"></i> In lý lịch KH</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="#"><i class="glyphicon glyphicon-envelope"></i> Liên hệ với NKH</a>

            </td>
            <td width="150" style="line-height:20px">

              <span>109 lượt xem</span>

            </td>
          </tr>
      </tbody>
     </table>

    <table class="archives_list">
      <tbody>
        <tr>

        	<td width="30" align="center">

            	<strong>1.</strong>

            </td>

            <td width="150"><strong>Họ và tên</strong></td>

            <td>

            	<strong>{{ $datas->ho_va_ten }}</strong>		

            </td>

        </tr>

        <tr>

            <td align="center">

            	<strong>2.</strong>

            </td>

            <td><strong>Học hàm/ học vị</strong></td>

            <td>

            	{{ $datas->hoc_vi }}

            </td>

          </tr>

          <tr>

            <td align="center">

            	<strong>3.</strong>

            </td>

            <td><strong>Năm sinh</strong></td>

            <td>

            	{{ $datas->nam_sinh }}

            </td>

          </tr>

          <tr>

            <td align="center">

            	<strong>4.</strong>

            </td>

            <td><strong>Chuyên ngành</strong></td>

            <td>

            	{!! $datas->chuyen_nganh !!}<br><br>

            </td>

          </tr>

          <tr>

            <td align="center">

            	<strong>5.</strong>

            </td>

            <td><strong>Cơ quan công tác</strong></td>

            <td>

            	{{ $datas->co_quan }}

            </td>

          </tr>

          <tr>

            <td align="center">


            </td>

            <td><strong>Địa chỉ cơ quan</strong></td>

            <td>

            	{{ $datas->dia_chi_co_quan }}

            </td>

          </tr>

          <tr>

            <td align="center">

            	<strong>6.</strong>

            </td>

            <td><strong>Hướng nghiên cứu</strong></td>

            <td>

            	Hướng nghiên cứu:<br>
		          {!! $datas->huong_nghien_cuu !!}

            </td>

          </tr>

          <tr>

            <td align="center">

            	<strong>7.</strong>

            </td>

            <td colspan="2"><strong>Danh sách công trình nghiên cứu tham gia</strong></td>

          </tr>

          @foreach($cong_trinh_nghien_cuu as $item)
              <tr>

              <td align="center">

                7.{{ $stt_ctnc++ }}

              </td>

              <td colspan="2">{!! $item['content'] !!}</td>

            </tr>
          @endforeach
          <tr>

            <td align="center">

            	<strong>8.</strong>

            </td>

            <td colspan="2"><strong>Danh sách kết quả nghiên cứu đã công bố</strong></td>

          </tr>

           @foreach($ket_qua_nghien_cuu as $item)
              <tr>

              <td align="center">

                8.{{ $stt_kqnc++ }}

              </td>

              <td colspan="2">{!! $item['content'] !!}</td>

            </tr>

          @endforeach
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
@section('script')
<script type="text/javascript">
    window.onload = function() {
        document.getElementById('search_form').setAttribute('action','/chuyen-gia');
    }
</script>
@endsection
<!-- end main-content -->