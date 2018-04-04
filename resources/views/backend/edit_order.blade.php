@extends('backend.layout')
@section('content')
<!-- CK Editor -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Orders
            <small>Sửa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/backend/orders">Orders</a></li>
            <li class="active">Sửa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body pad">
                        @if(!empty($message))
                    @if($message['success'])
                    <div class="callout callout-info">
                        <h4>Success</h4>

                        <p>{{$message['message']}}</p>
                    </div>
                    @else
                    <div class="callout callout-danger">
                        <h4>Error!</h4>

                        <p>{{$message['message']}}</p>
                    </div>
                    @endif
                    @endif
                        <form role="form" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Tên khách hàng</label>
                                <input type="text" class="form-control" disabled value="{{$order->customer_name}}">
                            </div>
                            <div class="form-group">
                                <label for="name">SĐT khách hàng</label>
                                <input type="text" class="form-control" disabled value="{{$order->customer_phone}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Email khách hàng</label>
                                <input type="text" class="form-control" disabled value="{{$order->customer_email}}">
                            </div>
                            <div class="form-group">
                                <label>Dịch vụ</label>
                                <input type="text" class="form-control" disabled value="{{$order->service_name}}">
                            </div>
                            <div class="form-group">
                                <label>Gói dịch vụ</label>
                                <input type="text" class="form-control" disabled value="{{$order->pricing_name}}">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá thành</label>
                                <input type="text" class="form-control" id="price" disabled value="{{$order->amount}}">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status" style="width: 20%">
                                    <option value="pending" {{($order->status == 'pending')?'selected':''}}>Đang chờ</option>
                                    <option value="success" {{($order->status == 'success')?'selected':''}}>Thành công</option>
                                    <option value="cancel" {{($order->status == 'cancel')?'selected':''}}>Đã huỷ</option>
                                </select>
                            </div>
                            
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
@endsection