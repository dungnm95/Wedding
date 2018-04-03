@extends('backend.layout')
@section('content')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Services
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Services</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="pull-left box-title">Danh sách Service</h3>
                        <a class="pull-right btn btn-instagram" href="/backend/services/add"><i class="fa fa-plus"></i> Thêm mới</a>
                    </div>
                    <div class="hidden callout">
                        <h4></h4>
                        <p></p>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tên dịch vụ</th>
                                    <th>Ảnh minh họa</th>
                                    <th>Giá thành</th>
                                    <th>Mô tả</th>
                                    <th>Dịch vụ hot?</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="table_content">
                                @if($services && !empty($services))
                                @foreach($services as $service)
                                <tr class="row_service">
                                    <td>{{$service->name}}</td>
                                    <td><img width="100" src="/{{$service->img}}"/></td>
                                    <td>{{number_format((int)$service->price)}}</td>
                                    <td>{{$service->description}}</td>
                                    <td>{{$service->is_hot}}</td>
                                    <td>{{date('d/m/Y H:i:s', $service->created_time)}}</td>
                                    <td>
                                        <a class="pull-left" href="/backend/services/edit/{{$service->id}}"> <i class="fa fa-edit"></i> Sửa</a>
                                        <a class="pull-right" href="#" onclick="remove_item({{$service->id}})" id="remove_{{$service->id}}"><i class="fa fa-remove"></i> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">Không có dữ liệu để hiển thị</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tên dịch vụ</th>
                                    <th>Ảnh minh họa</th>
                                    <th>Giá thành</th>
                                    <th>Mô tả</th>
                                    <th>Dịch vụ hot?</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
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
<script>
$(function () {
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
});
function remove_item (id) {
    if (confirm('Bạn có chắc chắn muốn xóa service này không ???')) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: window.location.origin + '/backend/services/delete/'+id,
            dataType: 'json',
            type: 'POST',
        }).done(function (response) {
            $('.callout').removeClass('hidden');
            if (response.success) {
                $('.callout').removeClass('callout-danger').addClass('callout-info');
                $('.callout h4').text('Success');
                $('#remove_'+id).closest('.row_service').remove();
                
                var total = $('#example2 .row_service').length;
                
                if(total <= 10){
                    $('#example2_info').text('Showing 1 to '+total+' of '+total+' entries');
                }
                if(total < 1){
                    $('.table_content').html('<tr><td colspan="7">Không có dữ liệu để hiển thị</td></tr>');
                    $('#example2_info').text('Showing 0 of 0 entries');
                }
                if(total > 10){
                    $('#example2_info').text('Showing 1 to 10 of '+total+' entries');
                }
            } else {
                $('.callout').addClass('callout-danger').removeClass('callout-info');
                $('.callout h4').text('Error');
            }
            $('.callout p').text(response.message);
        });
    }
}
</script>
@endsection