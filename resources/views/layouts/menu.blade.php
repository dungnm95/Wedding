@if(Request::is('gallery-detail'))
<header id="top">
    <div id="header-container">
        <div class="row   row_id_1364485391943 ">
            <div class="delimiter  twelve columns">
                <div style="" class="delimiter-type white_space margin_30px"></div>

            </div>

        </div>
        <div class="full_width_row  full_width_content_row " style="">
            <div class="row element row_id_logo_big ">
                <div class="logo align-center two columns"> 
                    <div class="align-middle" style="margin-top: 5.5px;">
                        <a style="width:130px" href="home_wedding.html">
                            <img alt="Tripod Fixed" width="130" src="imgs/logo.png">
                        </a>
                    </div>

                </div>
                <div class="menu align-right eight columns"> 
                    <div id="small-device-nav" class="small-device-nav ">
                        <ul id="small-menuid">
                            <li class="small-device-menu"><a href="#modal-menu" class="small-device-menu-link open-menu"><i class="ion-navicon-round"></i></a></li>
                        </ul>
                    </div>

                    <div id="modal-menu" class="modal-menu">
                        <nav class="main-menu cosmo-menu align-middle" style="margin-top: 19px;">
                            <ul id="menu-main-menu" class="mobile-menu">
                                <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page  {{(Request::is('/'))? 'selected':''}}  page_item page-item-50 current_page_item menu-item-has-children menu-item-184  first no_description">
                                    <a href="home_wedding.html">Trang Chủ</a>
                                </li>
                                <li id="menu-item-191" class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('galleries'))? 'selected':''}} menu-item-has-children menu-item-191  no_description"><a href="/galleries">Album Ảnh</a></li>
                                <li id="menu-item-183" class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('news'))? 'selected':''}} menu-item-has-children menu-item-183  no_description"><a href="/news">Tin tức</a></li>
                                <li id="menu-item-180" class="menu-item menu-item-type-custom menu-item-object-custom {{(Request::is('pricing'))? 'selected':''}} menu-item-180  no_description"><a href="/pricing">Bảng giá</a></li>
                                <li id="menu-item-193" class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('contact') || Request::is('services'))? 'selected':''}} menu-item-has-children menu-item-193  no_description"><a href="">Options</a>
                                    <ul class="children">
                                        <li id="menu-item-204" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-204  no_description"><a href="ContactUs.html">Contact Us</a></li>
                                        <li id="menu-item-206" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-206  no_description"><a href="Services.html">Our Services</a></li>
                                    </ul><div class="clear"></div>
                                </li>
                                
                            </ul>
                            <div class="clear"></div>
                        </nav>
                    </div>
                    <nav class="main-menu cosmo-menu align-middle" style="margin-top: 1px;">
                        <ul id="menu-main-menu-1" class="sf-menu sf-js-enabled">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page  {{(Request::is('/'))? 'selected':''}}  page_item page-item-50 current_page_item menu-item-has-children menu-item-184  first no_description"><a href="home_wedding.html" class="sf-with-ul">Trang chủ</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('galleries'))? 'selected':''}} menu-item-has-children menu-item-191  no_description"><a href="/galleries" class="sf-with-ul">Album Ảnh</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('news'))? 'selected':''}} menu-item-has-children menu-item-183  no_description"><a href="/news" class="sf-with-ul">Tin tức</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom {{(Request::is('pricing'))? 'selected':''}} menu-item-180  no_description"><a href="/pricing">Bảng giá</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('contact') || Request::is('services'))? 'selected':''}} menu-item-has-children menu-item-193  no_description"><a href="" class="sf-with-ul">Options<span class="sf-sub-indicator"> + </span></a>
                                <ul class="children" style="float: none; width: 16.5455em; display: none; visibility: hidden;">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-204  no_description"><a href="ContactUs.html">Contact Us</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-206  no_description"><a href="Services.html">Our Services</a></li>
                                </ul>
                                <div class="clear"></div>
                            </li>
                            
                        </ul>
                        <div class="clear"></div>
                    </nav> 
                </div>
                <div class="search-box-area align-right two columns">
                    <!--                            <ul class="cosmo-social align-middle" >
                                                    <li><a href="" target="_blank" class="fb hover-menu"><span class="ion-social-facebook"></span></a></li>
                                                    <li><a href="" target="_blank" class="twitter hover-menu"><span class="ion-social-twitter"></span></a></li>
                                                    <li><a href="" target="_blank" class="gplus hover-menu"><span class="ion-social-googleplus"></span></a></li>
                                                </ul>-->
                    <div class="header-menu-item-icon">
                        <a href="#" class="icon-search">
                            <i class="ion-search"></i>
                        </a>
                    </div>
                    <div class="search-form">
                        <form action="#" method="post">
                            <input type="text" placeholder="Search here...">
                            <a title="Close" class="close-icon" href="#"><i class="ion-close"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-header-delimiter hidden"></div>
</header>

@else
<header id="top">
    <div id="header-container">
        <div class="row   row_id_1364485418978 ">
            <div class="delimiter  twelve columns"><div style="" class="delimiter-type white_space margin_30px "></div></div>      
        </div>
        <div class="row element row_id_logo_big ">
            <div class="logo align-left two columns"> 
                <div class="align-top">
                    <a style="width:130px" href="home_wedding.html">
                        <img alt="Tripod Fixed" width="130" src="/imgs/logo.png">
                    </a>
                </div>
            </div>
            <div class="menu align-right seven columns"> 
                <div id="small-device-nav" class="small-device-nav">
                    <ul id="small-menuid">
                        <li class="small-device-menu"><a href="#modal-menu" class="small-device-menu-link open-menu"><span class="ion-navicon-round" aria-hidden="true"></span></a></li>
                    </ul>
                </div>
                <div id="modal-menu" class="modal-menu">
                    <nav class="main-menu cosmo-menu align-middle" style="margin-top: 19px;">
                        <ul id="menu-main-menu" class="mobile-menu">
                            <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page  {{(Request::is('/'))? 'selected':''}}  page_item page-item-50 current_page_item menu-item-has-children menu-item-184  first no_description"><a href="/">Trang Chủ</a></li>
                            <li id="menu-item-191" class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('galleries'))? 'selected':''}} menu-item-has-children menu-item-191  no_description"><a href="/galleries">Album Ảnh</a></li>
                            <li id="menu-item-183" class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('news'))? 'selected':''}} menu-item-has-children menu-item-183  no_description"><a href="">Blog</a></li>
                            <li id="menu-item-180" class="menu-item menu-item-type-custom menu-item-object-custom {{(Request::is('pricing'))? 'selected':''}} menu-item-180  no_description"><a href="/pricing">Bảng giá</a></li>
                            <li id="menu-item-193" class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('contact') || Request::is('services'))? 'selected':''}} menu-item-has-children menu-item-193  no_description"><a href="">Options</a>
                                <ul class="children">
                                    <li id="menu-item-204" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-204  no_description"><a href="ContactUs.html">Contact Us</a></li>
                                    <li id="menu-item-206" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-206  no_description"><a href="Services.html">Our Services</a></li>
                                 </ul><div class="clear"></div>
                            </li>
                            
                        </ul>
                        <div class="clear"></div>
                    </nav>
                </div>
                <nav class="main-menu cosmo-menu align-middle" style="margin-top: 1px;">
                    <ul id="menu-main-menu-1" class="sf-menu sf-js-enabled">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page  {{(Request::is('/'))? 'selected':''}}  page_item page-item-50 current_page_item menu-item-has-children menu-item-184  first no_description"><a href="/" class="sf-with-ul">Trang chủ</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('galleries'))? 'selected':''}} menu-item-has-children menu-item-191  no_description"><a href="/galleries" class="sf-with-ul">Album Ảnh</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('news'))? 'selected':''}} menu-item-has-children menu-item-183  no_description"><a href="/news" class="sf-with-ul">Tin tức</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom {{(Request::is('pricing'))? 'selected':''}} menu-item-180  no_description"><a href="/pricing">Bảng giá</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page {{(Request::is('contact') || Request::is('services'))? 'selected':''}} menu-item-has-children menu-item-193  no_description"><a href="" class="sf-with-ul">Options<span class="sf-sub-indicator"> + </span></a>
                            <ul class="children" style="float: none; width: 16.5455em; display: none; visibility: hidden;">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-204  no_description"><a href="/contact">Contact Us</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-206  no_description"><a href="/services">Our Services</a></li>
                            </ul><div class="clear"></div>
                        </li>
                        
                    </ul>
                    <div class="clear"></div>
                </nav>
            </div>
            <div class="search-box-area align-right three columns">
                <!--                            <ul class="cosmo-social align-middle" >
                                                <li><a href="" target="_blank" class="fb hover-menu"><span class="ion-social-facebook"></span></a></li>
                                                <li><a href="" target="_blank" class="twitter hover-menu"><span class="ion-social-twitter"></span></a></li>
                                                <li><a href="" target="_blank" class="gplus hover-menu"><span class="ion-social-googleplus"></span></a></li>
                                            </ul>-->
                <div class="header-menu-item-icon align-middle">
                    <a href="#" class="icon-search">
                        <i class="ion-search"></i>
                    </a>
                </div>
                <div class="search-form">
                    <form action="#" method="post">
                        <input type="text" placeholder="Search here...">
                        <a title="Close" class="close-icon" href="#"><i class="ion-close"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-header-delimiter hidden"></div>
</header>
@endif
