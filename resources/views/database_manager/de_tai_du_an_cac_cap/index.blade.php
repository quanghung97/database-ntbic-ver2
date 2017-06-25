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
  @if (session('status'))
    <div class="alert alert-success auto_disable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ session('status') }}
    </div>
@endif
  @if($can_insert)
  <div class="row-fluid">
    <div class="span12">
    <a href="{!! URL::asset('admin/quan-ly-du-lieu/de-tai-du-an-cac-cap/tao-moi') !!}">
      <button class="add-btn btn btn-success"><span class="fa fa-pencil"></span>&nbsp;&nbsp;Thêm đề tài, dự án các cấp</button></a>
    </div>
  </div>
  @endif
  <div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
              <h4>Bảng <span class="semi-bold">Đề tài, dự án các cấp</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
              <table class="table table-hover" id="example" >
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên đề tài</th>
                    <th>Mã số - Kí hiệu</th>
                    <th>Lĩnh vực</th>
                    <th>Chuyên ngành</th>
                    <th>Cơ quan</th>
                    <th>Năm bắt đầu</th>
                    <th>Năm kết thúc</th>
                    <th>Chủ nhiệm đề tài</th>
                    <th>Xem</th>  
                    @if($can_update)
                      <th>Sửa</th>
                    @endif
                    @if($can_delete)
                     <th>Xóa</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($datas as $key=>$row)
                  <tr class="odd gradeX">
                    <td>{{$key+1}}</td>
                    <td>{{$row->ten_de_tai}}</td>
                    <td>{{$row->maso_kyhieu}}</td>
                    <td class="center"> {{$row->linh_vuc}}</td>
                    <td class="center"> {{$row->chuyen_nganh_khcn}}</td>
                    <td class="center">{{$row->co_quan}}</td>
                    <td>{{$row->nam_bat_dau}}</td>
                    <td>{{$row->nam_ket_thuc}}</td>
                    <td>{{$row->chu_nhiem_detai}}</td>
                    <td class="center"><a target="_blank" href="{!! URL::asset('de-tai-du-an-cac-cap/'.$row->link)  !!}"><span class="fa fa-eye"></span></a></td>
                    @if($can_update)
                      <td class="center"><a href="{!! URL::asset('admin/quan-ly-du-lieu/de-tai-du-an-cac-cap/sua/'.$row->id) !!}"><span class="fa fa-pencil-square"></span></a></td>
                    @endif
                    @if($can_delete)
                      <td class="center"><div delete-modal" data-toggle="modal" data-target="#delete-modal{{$row->id}}"><span class="fa fa-trash-o"></span></a></div></td>
                    @endif
                   <!--  delete modal -->
                    <div id="delete-modal{{$row->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xóa doanh nghiệp {{$row->ten_de_tai}} đã chọn?</h4>
                          </div>
                          <div class="modal-footer">
                            <a href="{{URL::asset('admin/quan-ly-du-lieu/de-tai-du-an-cac-cap/xoa/'.$row->id)}}" class="btn btn-primary" id="submit-delete">Xóa</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                          </div>
                        </div>
                      </div>
                    </div>
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



@section('script')

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
<script src="/public/js/admin/admin_database_manager.js" type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(".sub-menu").css('display','block');
  $("#sub_menu_quan_ly_database").addClass("active");
  $("#active_de_tai").addClass("active");
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