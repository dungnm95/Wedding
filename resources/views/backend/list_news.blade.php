@extends('backend.layout')
@section('content')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            News
        </h1>
        <ol class="breadcrumb">
            <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">News</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="pull-left box-title">Danh sách News</h3>
                        <a class="pull-right btn btn-instagram" href="/backend/news/add"><i class="fa fa-plus"></i> Thêm mới</a>
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
                                    <th>Tiêu đề</th>
                                    <th>Ảnh minh họa</th>
                                    <th>Nội dung chính</th>
                                    <th>Tin hot?</th>
                                    <th>Admin tạo</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="table_content">
                                @if($news && !empty($news))
                                @foreach($news as $new)
                                <tr class="row_news">
                                    <td>{{$new->title}}</td>
                                    <td><img width="200" src="/{{$new->img}}"/></td>
                                    <td>{{$new->pre_content}}</td>
                                    <td>{{$new->is_hot}}</td>
                                    <td>{{$new->admin_created}}</td>
                                    <td>{{date('d/m/Y H:i:s', $new->created_time)}}</td>
                                    <td>
                                        <a class="pull-left" href="/backend/news/edit/{{$new->id}}"> <i class="fa fa-edit"></i> Sửa</a>
                                        <a class="pull-right" href="#" onclick="remove_item({{$new->id}})" id="remove_{{$new->id}}"><i class="fa fa-remove"></i> Xóa</a>
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
                                    <th>Tiêu đề</th>
                                    <th>Ảnh minh họa</th>
                                    <th>Nội dung chính</th>
                                    <th>Tin hot?</th>
                                    <th>Admin tạo</th>
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
    if (confirm('Bạn có chắc chắn muốn xóa news này không ???')) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: window.location.origin + '/backend/news/delete/'+id,
            dataType: 'json',
            type: 'POST',
        }).done(function (response) {
            $('.callout').removeClass('hidden');
            if (response.success) {
                $('.callout').removeClass('callout-danger').addClass('callout-info');
                $('.callout h4').text('Success');
                $('#remove_'+id).closest('.row_news').remove();
                
                var total = $('#example2 .row_news').length;
                
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