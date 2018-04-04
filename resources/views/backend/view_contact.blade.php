@extends('backend.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contacts
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/backend/contacts"><i class=""></i> Contacts</a></li>
            <li class="active">Xem</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Xem tin nhắn</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3>{{$contact->customer_name}}</h3>
                            <h5><i>Email: {{$contact->customer_email}}</i></h5>
                            <h5><i>SĐT: {{$contact->customer_phone}}</i>
                                <span class="mailbox-read-time pull-right">{{date('d/m/Y H:i:s', $contact->created_time)}}</span></h5>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-read-message">
                            <p>{{$contact->message}}</p>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.box-body -->
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