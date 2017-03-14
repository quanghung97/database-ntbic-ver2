@extends('layouts.master')
@section('style')
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/details_de_tai_du_an_cac_cap.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/search_result_phat_minh_sang_che.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/sidebar.css') }}">
@endsection
<!-- main-content -->
@section("content")
<div class="row col-md-12 filter-row">
                <div class="filter">
                    <ul class="list-search-filter">
                        <li>
                            <select name="tim_theo">
                                @if($tim_theo == '0')
                                    <option value="0" selected="">Tìm theo</option>
                                @else
                                    <option value="0">Tìm theo</option>
                                @endif

                                @if($tim_theo == '1')
                                    <option value="1" selected="">Tên phát minh, sáng chế, giải pháp</option>
                                @else
                                    <option value="1">Tên phát minh, sáng chế, giải pháp</option>
                                @endif

                                @if($tim_theo == '2')
                                    <option value="2" selected="">Điểm nổi bật</option>
                                @else
                                    <option value="2">Điểm nổi bật</option>
                                @endif

                                @if($tim_theo == '3')
                                    <option value="3" selected="">Tác giả</option>
                                @else
                                    <option value="3">Tác giả</option>
                                @endif
                            </select>
                        </li>
                        <li>
                            <select name='linh_vuc_khcn'>
                              <option value="0">Lĩnh vực KH&CN</option>
                              @foreach($linh_vuc as $lv)
                                @if($linh_vuc_current == $lv->id)
                                    <option value="{{$lv->id}}" selected="">{{$lv->linh_vuc}}</option>
                                @else
                                    <option value="{{$lv->id}}">{{$lv->linh_vuc}}</option>
                                @endif
                              @endforeach
                            </select>
                        </li>
                        <li>
                            <select name="loai">
                              <option value="0">Loại</option>
                              @foreach($loai_phat_minh as $loai)
                                @if($loai_phat_minh_current == $loai->id)
                                    <option value="{{$loai->id}}" selected="">{{$loai->loai_phat_minh_sang_che}}</option>
                                @else
                                    <option value="{{$loai->id}}">{{$loai->loai_phat_minh_sang_che}}</option>
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
    <div class="articles_detail col-md-12">

        <h2 class="title_pages">{{ $datas->ten }}</h2>

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

                <td width="150"><strong> Tên sáng chế, phát minh, giải pháp</strong></td>

                <td>

                {{ $datas->ten }}

                </td>

            </tr>

            <tr>

                <td align="center">

                    <strong>2.</strong>

                </td>

                <td><strong>Số bằng,ký hiệu</strong></td>

                <td>

                  {{ $datas->sobang_kyhieu }}

                </td>

              </tr>

              <tr>

                <td align="center">

                    <strong>3.</strong>

                </td>

                <td><strong>Thuộc lĩnh vực KH&CN</strong></td>

                <td>

                    {{ $datas->linh_vuc.' ('.$datas->loai_phat_minh_sang_che.')' }}
                </td>

              </tr>

              <tr>

                <td align="center">

                    <strong>4.</strong>

                </td>

                <td><strong> Ngày công bố</strong></td>

                <td>

                   {{ $datas->ngay_cong_bo }}

                </td>

              </tr>

              <tr>

                <td align="center">

                    <strong>5.</strong>

                </td>

                <td><strong> Ngày cấp</strong></td>

                <td>

                   {{ $datas->ngay_cap }}

                </td>

              </tr>

              <tr>

                <td align="center">

                    <strong>6.</strong>

                </td>

                <td><strong> Chủ sở hữu chính</strong></td>

                <td>

                   {{ $datas->chu_so_huu_chinh }}

                </td>

              </tr>

              <tr>

                <td align="center">

                    <strong>7.</strong>

                </td>

                <td><strong> Tác giả</strong></td>
                <td>
                	{{ $datas->tac_gia }}

                </td>

              </tr>

                

            <tr>

             

                <td colspan="3"><strong>8. Điểm nổi bật</strong><br>

                {!! $datas->diem_noi_bat !!}
                </td>


            </tr>
            <tr>
             

                <td colspan="3"><strong> 9. Mô tả về sáng chế, phát minh, giải pháp</strong><br>

                {!! $datas->mota_sangche_phatminh_giaiphap !!}
                </td>


            </tr>
            <tr>
               

                <td colspan="3"><strong>10. Nội dung có thể chuyển giao</strong><br>

                {!! $datas->noidung_cothe_chuyengiao !!}
                </td>
            </tr>
            <tr>
                

                <td colspan="3"><strong>11. Thị trường ứng dụng</strong><br>

                {!! $datas->thitruong_ungdung !!}
                </td>
            </tr>
             <tr>
              

                <td colspan="3"><strong>12. Hình ảnh minh họa </strong><br>
                <img src="{{ $datas->hinh_anh_minh_hoa }}" />
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
        document.getElementById('search_form').setAttribute('action','/phat-minh');
    }
</script>
@endsection