@extends('backend.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contacts
            <small>13 new messages</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Contact</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">All contacts</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @if(!empty($contacts))
                                    @foreach($contacts as $contact)
                                    @if($contact->is_read == 'no')
                                    <tr>
                                        <td><i class="fa fa-circle"></i></td>
                                        <td class="mailbox-star"><a href="/backend/contacts/view/{{$contact->id}}">{{$contact->customer_name}}</a></td>
                                        <td class="mailbox-subject">{{ str_limit($contact->message,100, ' [...]')}}</td>
                                        <td class="mailbox-date">{{date('d/m/Y',$contact->created_time)}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><i class="fa fa-circle-o"></i></td>
                                        <td class="mailbox-star"><a href="/backend/contacts/view/{{$contact->id}}">{{$contact->customer_name}}</a></td>
                                        <td class="mailbox-subject">{{ str_limit($contact->message,100, ' [...]')}}</td>
                                        <td class="mailbox-date">{{date('d/m/Y H:i:s',$contact->created_time)}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>Không có gì để hiển thị</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {!!$contacts->appends(Request::except('page'))->render()!!}
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <!--                    <div class="box-footer no-padding">
                                            <div class="mailbox-controls">
                                                 Check all button 
                                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                                </button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                                                </div>
                                                 /.btn-group 
                                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                                                <div class="pull-right">
                                                    1-50/200
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                                    </div>
                                                     /.btn-group 
                                                </div>
                                                 /.pull-right 
                                            </div>
                                        </div>-->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection