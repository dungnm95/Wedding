@extends('backend.layout')
@section('content')
<!-- CK Editor -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pricings
            <small>Tạo mới</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/backend/pricings">Pricing</a></li>
            <li class="active">Tạo mới</li>
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
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" required name="name">
                            </div>
                            <div class="form-group">
                                <label>Dịch vụ</label>
                                <select class="form-control" name="service_id" style="width: 20%">
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá thành</label>
                                <input type="text" class="form-control" id="price" required name="price">
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="editor1" name="content" rows="10" cols="80"></textarea>
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