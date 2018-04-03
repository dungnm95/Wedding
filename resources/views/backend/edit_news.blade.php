@extends('backend.layout')
@section('content')
<!-- CK Editor -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            News
        </h1>
        <ol class="breadcrumb">
            <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/backend/news">News</a></li>
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
                                <label for="title">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" value="{{$news->title}}" name="title">
                            </div>
                            <div class="form-group">
                                <label for="img">Ảnh minh họa</label>
                               <br/><img src="/{{$news->img}}" width="250" style="margin: 10px 0;"/>
                                <input type="file" id="img" name="img">
                            </div>
                            <div class="form-group">
                                <label>Tin hot?</label>
                                <select class="form-control" name="is_hot" style="width: 20%">
                                    <option value="no" {{($news->is_hot == 'no')?'selected':''}}>Không</option>
                                    <option value="yes" {{($news->is_hot == 'yes')?'selected':''}}>Có</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" rows="5" name="pre_content" id="description">{{$news->pre_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="editor1" name="content" rows="10" cols="80">{{$news->content}}</textarea>
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