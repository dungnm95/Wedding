@extends('backend.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Services
        </h1>
        <ol class="breadcrumb">
            <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/backend/services">Services</a></li>
            <li class="active">Tạo mới</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo service mới</h3>
                    </div>
                    <!-- /.box-header -->
                    @if(!empty($message))
                    @if($success)
                    <div class="callout callout-info">
                        <h4>Success</h4>

                        <p>{{$message}}</p>
                    </div>
                    @else
                    <div class="callout callout-danger">
                        <h4>Error!</h4>

                        <p>{{$message}}</p>
                    </div>
                    @endif
                    @endif
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="img">Ảnh mô tả</label>
                                <input type="file" id="img" name="img">
                            </div>

                            <div class="form-group">
                                <label>Hot service?</label>
                                <select class="form-control" name="is_hot" style="width: 20%">
                                    <option value="no">Không</option>
                                    <option value="yes">Có</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                            </div>
                        </div>


                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->


        </div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<style>
    .album_detail_row
    {
        margin-top: 15px;
    }
</style>
@endsection