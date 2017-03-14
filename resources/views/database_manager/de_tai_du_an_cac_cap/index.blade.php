@extends('admin.home')
@section('css')
<link href="/webarch/webarch/HTML/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/webarch/webarch/HTML/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="/webarch/webarch/HTML/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<link rel="stylesheet" type="text/css" href="/public/css/admin_chuyen_gia.css">
@endsection
@section('main')
  <div class="row-fluid">
    <div class="span12">
    <a href="{!! URL::asset('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap/tao-moi') !!}">
      <button class="add-btn btn btn-success"><span class="fa fa-pencil"></span>&nbsp;&nbsp;Thêm đề tài dự án các cấp</button></a>
    </div>
  </div>
  <div class="content-wrapper">
    @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
              @endif
  </div>
  
  <div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
              <h4>Table <span class="semi-bold">Styles</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
              <table class="table table-hover" id="example" >
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên đề tài</th>
                    <th>Mã số - Kí hiệu</th>
                    <th>Lĩnh vực</th>
                    <th>Chuyên ngành</th>
                    <th>Cơ quan</th>
                    <th>Năm bắt đầu</th>
                    <th>Năm kết thúc</th>
                    <th>Chủ nhiệm đề tài</th>  
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($datas as $row)
                  <tr class="odd gradeX">
                    <td>{{$row->id}}</td>
                    <td>{{$row->ten_de_tai}}</td>
                    <td>{{$row->maso_kyhieu}}</td>
                    <td class="center"> {{$row->linh_vuc}}</td>
                    <td class="center"> {{$row->chuyen_nganh_khcn}}</td>
                    <td class="center">{{$row->co_quan}}</td>
                    <td>{{$row->nam_bat_dau}}</td>
                    <td>{{$row->nam_ket_thuc}}</td>
                    <td>{{$row->chu_nhiem_detai}}</td>
                    <td class="center"><a href="{!! URL::asset('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap/sua/'.$row->id) !!}"><span class="fa fa-pencil-square"></span></a></td>
                    <td class="center"><a href="{{URL::asset('quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap/xoa/'.$row->id)}} "><span class="fa fa-trash-o"></span></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          
            {!! $datas->appends(request()->input())->links() !!}
          </div>
        </div>
      </div>
@endsection

<script>
$('div.alert').delay(300).fadeOut(350);
</script>

@section('script')
<script src="/webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>    
<script src="/webarch/webarch/HTML/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="/webarch/webarch/HTML/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="/webarch/webarch/HTML/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="/webarch/webarch/HTML/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="/webarch/webarch/HTML/assets/js/datatables.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/webarch/webarch/HTML/assets/js/core.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/js/chat.js" type="text/javascript"></script>
<script src="/webarch/webarch/HTML/assets/js/demo.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    $("#example").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection