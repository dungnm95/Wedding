@extends('backend.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Albums
        </h1>
        <ol class="breadcrumb">
            <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/backend/albums">Albums</a></li>
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
                        <h3 class="box-title">Tạo album mới</h3>
                    </div>
                    <!-- /.box-header -->
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
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="img">Ảnh minh họa</label>
                                <input type="file" id="img" name="img" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
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
                                <label for="exampleInputPassword1">Ảnh/Video trong Album</label>
                                <div class="form-group" id="album_detail" style="padding: 3px 20px;">
                                    <div class="album_detail_row row">
                                        <div class="col-md-2">
                                            <label>Ảnh/video?</label>
                                            <select class="form-control detail_type" name="detail[type][]">
                                                <option value="img" selected>Ảnh</option>
                                                <option value="video">Video</option>
                                            </select>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="choose-img">
                                                <label for="file_img">Ảnh</label>
                                                <input type="file" id="file_img" name="detail[img][]" >
                                            </div>
                                            <div class="choose-video hidden">
                                                <label for="file_video">Video link</label>
                                                <input class="form-control" type="text" id="file_video"  name="detail[video][]">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label></label>
                                            <button class="btn-add" type="button"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
    $('.btn-add').click(function () {
        var html = '<div class="album_detail_row row"><div class="col-md-2">'
                + '<label>Ảnh/video?</label>'
                + '<select class="form-control detail_type" name="' + "detail[type][]" + '">'
                + '<option value="img" selected>Ảnh</option>'
                + '<option value="video">Video</option>'
                + '</select>'
                + '</div>'
                + '<div class="col-md-9">'
                + '<div class="choose-img">'
                + '<label for="file_img">Ảnh</label>'
                + '<input type="file" id="file_img" name="' + "detail[img][]" + '" >'
                + '</div>'
                + '<div class="choose-video hidden">'
                + '<label for="file_video">Video link</label>'
                + '<input class="form-control" type="text" id="file_video" name="' + "detail[video][]" + '">'
                + '</div>'
                + '</div>'
                + '<div class="col-md-1">'
                + '<button class="btn-remove" type="button"><i class="fa fa-minus"></i></button>'
                + '</div></div>';
        $("#album_detail").append(html);
        $('.btn-remove').click(function () {
            $(this).closest('.album_detail_row').remove();
        });
        $('.detail_type').click(remove_detail_row);
    });
    $('.detail_type').click(remove_detail_row);
    function remove_detail_row() {
        var type = $(this).val();
        if (type === 'video') {
            $(this).closest('.album_detail_row').find('.choose-video').removeClass('hidden');
            $(this).closest('.album_detail_row').find('.choose-img').addClass('hidden');
        } else {
            $(this).closest('.album_detail_row').find('.choose-video').addClass('hidden');
            $(this).closest('.album_detail_row').find('.choose-img').removeClass('hidden');
        }
    }

</script>
<style>
    .album_detail_row{
        margin-top: 15px;
    }
</style>
@endsection