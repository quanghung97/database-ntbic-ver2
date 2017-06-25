@extends('admin.home')
@section('is_active_userpage')
  active
@endsection
@section('css')
<link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="{{ URL::asset('webarch/webarch/HTML/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('webarch/webarch/HTML/assets/css/custom-icon-set.css') }}" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/admin_chuyen_gia.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/admin_user_manager.css') }}">
@endsection
@section('main')
  <div class="row-fluid">
    <div class="span12">
      <a href="{{ URL::asset('admin/quan-ly-nguoi-dung/them-nguoi-dung') }}"><button class="add-btn btn btn-success"><span class="fa fa-pencil"></span>&nbsp;&nbsp;Thêm người dùng</button></a>
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
                    <button class="close" data-dismiss="alert"></button> {{ session('success') }}</div>
               @endif

              <table class="table table-hover" id="example" >
                <thead>
                  <tr>
                    <th id="id" width="10%">id</th>
                    <th width="15%">Họ và tên</th>
                    <th id="username">Tên tài khoản</th>
                    <th>Email</th>
                    <th id="author">Quyền</th>
                    <th>Tình trạng</th>
                    <th id="edit">Sửa</th>
                    <th id="delete">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr class="odd gradeX">
                    <td id="id">{{ $user->id }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td id="username">{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td id="author">{{ $user->author }}</td>
                    @if($user->user_id == null)
                        <td style="color: green"><i class="fa fa-check"></i></td>
                    @else
                        <td><a href="{{ url('admin/quan-ly-nguoi-dung/kich-hoat-tai-khoan/'.$user->user_id) }}" onclick="return confirm('Bạn có chắc chắn kích hoạt người dùng này?')">ACTIVE</a></td>
                    @endif
                    <td class="center" id="edit"><a href="{{ URL::asset('admin/quan-ly-nguoi-dung/chinh-sua-nguoi-dung/'.$user->id) }}"><span class="fa fa-pencil-square"></span></a></td>
                    <td class="center" id="delete"><a href="{{ URL::asset('admin/quan-ly-nguoi-dung/xoa-nguoi-dung/'.$user->id) }}" onclick="return confirm('Bạn có chắc chắn xóa người dùng này?')"><span class="fa fa-trash-o"></span></a></td>
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