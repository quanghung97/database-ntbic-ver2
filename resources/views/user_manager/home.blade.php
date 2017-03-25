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
<link rel="stylesheet" type="text/css" href="/public/css/admin_user_manager.css">
@endsection
@section('main')
  <div class="row-fluid">
    <div class="span12">
      <a href="{{ URL::asset('quan-tri-vien/quan-ly-nguoi-dung/them-nguoi-dung') }}"><button class="add-btn btn btn-success"><span class="fa fa-pencil"></span>&nbsp;&nbsp;Thêm người dùng</button></a>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
              <h4>Danh sách <span class="semi-bold"> Người dùng</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
              @if(session('success'))
                      <div class="alert alert-success">
                    <button class="close" data-dismiss="alert"></button> xoá người dùng "{{ old("username") }}" thành công !</div>
               @endif
              <table class="table table-hover" id="example" >
                <thead>
                  <tr>
                    <th id="id">id</th>
                    <th id="username">tên tài khoản</th>
                    <th id="author">quyền</th>
                    <th id="edit">sửa</th>
                    <th id="delete">xóa</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr class="odd gradeX">
                    <td id="id">{{ $user->id }}</td>
                    <td id="username">{{ $user->username }}</td>
                    <td id="author">{{ $user->author }}</td>
                    <td class="center" id="edit"><a href="{{ URL::asset('quan-tri-vien/quan-ly-nguoi-dung/chinh-sua-nguoi-dung/'.$user->id) }}"><span class="fa fa-pencil-square"></span></a></td>
                    <td class="center" id="delete"><a href="{{ URL::asset('quan-tri-vien/quan-ly-nguoi-dung/xoa-nguoi-dung/'.$user->id) }}" onclick="return confirm('Bạn có chắc chắn xóa người dùng này ?')"><span class="fa fa-trash-o"></span></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!! $users->appends(request()->input())->render() !!}
            </div>
          </div>
        </div>
      </div>
@endsection

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
  $("#active_quan_ly_user").addClass("active");
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