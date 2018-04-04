<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/empty_avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Session::get('admin_name')}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{(Route::getFacadeRoot()->current()->uri() == 'backend')?'active':''}}">
                <a href="/backend"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{(strpos(Route::getFacadeRoot()->current()->uri(), 'backend/orders') !== false)?'active':''}}">
                <a href="/backend/orders"><i class="fa fa-cart-plus"></i> <span>Orders</span></a>
            </li>
            <li class="{{(strpos(Route::getFacadeRoot()->current()->uri(),'backend/albums') !== false)?'active':''}}">
                <a href="/backend/albums"><i class="fa fa-book"></i> <span>Albums</span></a>
            </li>
            <li class="{{(strpos(Route::getFacadeRoot()->current()->uri(),'backend/services') !== false)?'active':''}}">
                <a href="/backend/services"><i class="fa fa-cogs"></i> <span>Services</span></a>
            </li>
            <li class="{{(strpos(Route::getFacadeRoot()->current()->uri(),'backend/pricings') !== false)?'active':''}}">
                <a href="/backend/pricings"><i class="fa fa-money"></i> <span>Pricing</span></a>
            </li>
            <li class="{{(strpos(Route::getFacadeRoot()->current()->uri(),'backend/news')!== false)?'active':''}}">
                <a href="/backend/news"><i class="fa fa-newspaper-o"></i> <span>News</span></a>
            </li>
            <li class="{{(strpos(Route::getFacadeRoot()->current()->uri(),'backend/contacts')!== false)?'active':''}}">
                <a href="/backend/contacts"><i class="fa fa-comments"></i> <span>Contacts</span></a>
            </li>
            <li class="{{(strpos(Route::getFacadeRoot()->current()->uri(),'backend/check_log')!== false)?'active':''}}">
                <a href="/backend/check_log"><i class="fa fa-sticky-note"></i> <span>Admin logs</span></a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
