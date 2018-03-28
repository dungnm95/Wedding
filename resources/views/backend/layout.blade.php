<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="/css/bootstrap.min_1.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/css/all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="/css/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/css/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="/css/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="/css/bootstrap3-wysihtml5.min.css">


        <!-- jQuery 3 -->
        <script src="/js/jquery.min_1.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/js/jquery-ui.min_1.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/js/bootstrap.min_1.js"></script>
        <!-- Morris.js charts -->
        <script src="/js/raphael.min.js"></script>
        <script src="/js/morris.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
        <!-- Sparkline -->
        <script src="/js/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/js/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/js/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="/js/moment.min.js"></script>
        <script src="/js/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="/js/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/js/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/js/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/js/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="/js/demo.js"></script>

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <section>
                @include('backend.menu')
                <!-- Left side column. contains the logo and sidebar -->
                @include('backend.sidebar')

                <!-- Content Wrapper. Contains page content -->
                @yield('content')
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
        </div>

        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

</body>
</html>