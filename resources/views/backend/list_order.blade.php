@extends('backend.layout')
@section('content')
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách order</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Dịch vụ</th>
                                    <th>Gói dịch vụ</th>
                                    <th>Giá thành</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($orders))
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{$order->customer_phone}}</td>
                                    <td>{{$order->service_name}}</td>
                                    <td>{{$order->pricing_name}}</td>
                                    <td>{{number_format($order->amount)}}</td>
                                    <td>
                                        {{($order->status == 'pending')?'Đang chờ':''}}
                                        {{($order->status == 'success')?'Thành công':''}}
                                        {{($order->status == 'cancel')?'Đã huỷ':''}}
                                    </td>
                                    <td>{{date('d/m/Y',$order->created_time)}}</td>
                                    <td><a href="/backend/orders/edit/{{$order->id}}"><i class="fa fa-edit"></i></a></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Dịch vụ</th>
                                    <th>Gói dịch vụ</th>
                                    <th>Giá thành</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Sửa</th>
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
</script>
@endsection