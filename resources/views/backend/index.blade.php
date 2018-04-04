@extends('backend.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Wedding CMS</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$total_order}}</h3>

                        <p>Tổng order trong tháng này</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{number_format($total_amount)}}<sup style="font-size: 20px"></sup></h3>

                        <p>Doanh thu trong tháng này</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Biểu đồ order trong tháng này</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="order_chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->



                <!-- /.box -->


            </section>
            <!-- /.Left col -->
            <section class="col-lg-5 connectedSortable">

                <!-- solid sales graph -->
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>

                        <h3 class="box-title">Biểu đồ doanh thu tháng này</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="revenue_chart" style="height: 250px;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->



            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
</div>
<script>
    var line = new Morris.Area({
        element: 'revenue_chart',
        resize: true,
        data: {!!($revenue_chart)!!},
        xkey: 'label',
        ykeys: ['value'],
        labels: ['Doanh thu'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: '#fff',
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ['#efefef'],
        gridLineColor: '#efefef',
        gridTextFamily: 'Open Sans',
        gridTextSize: 10,
        dateFormat:function (d) {
                var date = new Date(d);
                var month = date.getMonth() + 1;
                var day = date.getDate();
                if(month < 10){
                    month = '0'+month; 
                }
                if(day < 10){
                    day = '0'+day; 
                }
                return day+'/'+month+'/'+date.getFullYear();
            },
            xLabelFormat: function (date) {
                var month = date.getMonth() + 1;
                var day = date.getDate();
                if(month < 10){
                    month = '0'+month; 
                }
                if(day < 10){
                    day = '0'+day; 
                }
                return day+'/'+month;

            },
    });
    var area = new Morris.Line({
    element   : 'order_chart',
    resize    : true,
    data      : {!!($order_chart)!!},
    xkey      : 'label',
    ykeys     : ['success', 'pending', 'cancel'],
    labels    : ['Success', 'Pending', 'Cancel'],
    lineColors: ['#a0d0e0', '#3c8dbc', '#0ba5ff'],
    hideHover : 'auto'
  });
</script>
@endsection