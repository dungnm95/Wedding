<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registration</title>
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
        <!-- iCheck -->
        <link rel="stylesheet" href="/css/blue.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="/backend/login"><b>Wedding CMS</b></a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register a new account</p>

                <div class="form-group has-feedback">
                        <input type="text" name="name"class="form-control" placeholder="Full name" required="">
                        <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username" required="">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" pattern=".{6,}" title="Tối thiểu 6 ký tự">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="re_password" class="form-control" placeholder="Retype password" required="" pattern=".{6,}" title="Tối thiểu 6 ký tự">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <span id="notice" class="hidden">Mật khẩu không trùng khớp</span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="button" class="btn btn-primary btn-block btn-flat" id="register">Register</button>
                        </div>
                    </div>

                <br/><a href="/backend/login" class="text-center">Đăng nhập</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->

        <!-- jQuery 3 -->
        <script src="/js/jquery.min_1.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/js/bootstrap.min_1.js"></script>
        <!-- iCheck -->
        <script src="/js/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });

            });
            $('#register').click(function () {
                var name = $("input[name='name']").val();
                var username = $("input[name='username']").val();
                var password = $("input[name='password']").val();
                var re_password = $("input[name='re_password']").val();
                if (password === re_password) {
                    var data = {'name': name, 'username': username, 'password': password};
                    $.ajax({
                        headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: window.location.origin+'/backend/create_account',
                        dataType: 'json',
                        type: 'POST',
                        data: data
                    }).done(function (response) {
                            $('#notice').text(response.message);
                            $('#notice').removeClass('hidden');
                            if(response.success){
                                setTimeout(function(){
                                    window.location.href = "/backend/login";
                                }, 3000);
                            }
                        });
                } else {
                    $('#notice').text('Mật khẩu không trùng khớp');
                    $('#notice').removeClass('hidden');
                }
            });
        </script>
    </body>
</html>