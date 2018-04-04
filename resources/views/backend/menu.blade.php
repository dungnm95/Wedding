<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Wedding CMS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Wedding CMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-danger">{{$new_order}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Bạn có {{$new_order}} order mới</li>
                        <li class="footer"><a href="/backend/orders">Xem tất cả</a></li>
                    </ul>
                </li>
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-warning">{{$new_contact}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Bạn có {{$new_contact}} tin nhắn mới</li>
                        <li class="footer"><a href="/backend/contacts">Xem tất cả</a></li>
                    </ul>
                </li>
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/img/empty_avatar.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Session::get('admin_name')}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/img/empty_avatar.png" class="img-circle" alt="User Image">

                            <p>
                               {{Session::get('admin_name')}} ({{Session::get('username')}})
                                <small>Admin</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>