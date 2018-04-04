@extends('backend.layout')
@section('content')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin logs
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Admin logs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All admin logs</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Admin name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($logs) || $logs != null)
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{$log->name}}</td>
                                    <td>{{$log->username}}</td>
                                    <td>{{$log->action}}</td>
                                    <td>{{date('d/m/Y H:i:s', $log->time)}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr><td colspan="4">Không có gì để hiển thị</td></tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <tr>
                                    <th>Admin name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                    <th>Time</th>
                                </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
@endsection