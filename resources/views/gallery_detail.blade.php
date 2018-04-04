@extends('layouts.main_gallery_detail')
@section('contend')
<div id="page" class="container ">
    <div id="fb-root"></div>
    <div class="relative row"></div>
    <header id="top">
        <div id="header-container">
            <div class="row   row_id_1364485391943 ">
                <div class="delimiter  twelve columns">
                    <div style="" class="delimiter-type white_space margin_30px "></div>

                </div>

            </div>
            <div class="full_width_row  full_width_content_row " style="">
                <div class="row element row_id_logo_big ">
                    <div class="logo align-center two columns"> 
                        <div class="align-middle" style="margin-top: 5.5px;">
                            <a style="width:130px" href="">
                                <img alt="Tripod Fixed" width="130" src="/imgs/logo.png">
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
                                <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-50 current_page_item menu-item-has-children menu-item-184  first no_description">
                                    <a href="home_wedding.html">Trang Chủ</a>
                                </li>
                                <li id="menu-item-191" class="menu-item menu-item-type-post_type menu-item-object-page selected menu-item-has-children menu-item-191  no_description"><a href="/galleries">Album Ảnh</a></li>
                                <li id="menu-item-183" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-183  no_description"><a href="/news">Tin tức</a></li>
                                <li id="menu-item-180" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-180  no_description"><a href="/pricing">Bảng giá</a></li>
                                <li id="menu-item-193" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-193  no_description"><a href="">Options</a>
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
                            <li class="menu-item menu-item-type-post_type menu-item-object-page   page_item page-item-50 current_page_item menu-item-has-children menu-item-184  first no_description"><a href="home_wedding.html" class="sf-with-ul">Trang chủ</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page selected menu-item-has-children menu-item-191  no_description"><a href="/galleries" class="sf-with-ul">Album Ảnh</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-183  no_description"><a href="/news" class="sf-with-ul">Tin tức</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-180  no_description"><a href="/pricing">Bảng giá</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-193  no_description"><a href="" class="sf-with-ul">Options<span class="sf-sub-indicator"> + </span></a>
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

    <div class="header-collapser ion-chevron-up animated"></div>
    <section id="main" class="sly">
        <div class="main-container " style="height: 738px; opacity: 1;">
            <div class=" show-collapse">
                <div class="gallery-info" style="display: block;">
                    <h1 class="post-title">{{$album->title}}</h1>
                    <div class="single-like-container">
                        <span class="meta-likes like ilove set-like voteaction">
                            <em class="like-btn ion-android-favorite-outline">
                            </em>
                            <i class="like-count like-303">{{$album->count_view}}</i>
                        </span>
                    </div>
                    <div class="meta-details"><ul class="meta-details-list">
                            <li class="meta-details-author"><i class="ion-android-person"></i>{{$album->admin_created}}</li>
                            <li class="meta-details-date"><i class="ion-android-time"></i>{{date('d/m/Y',$album->created_time)}}</li>
                        </ul>
                    </div>
                    <div class="content">
                        <p>{{$album->description}}</p>
                    </div>
                </div>
                <div class="collapse-btn" style="margin-left: 0px;">
                    <i class="ion-chevron-left"></i>
                    <span>Thu nhỏ/ Phóng to</span>
                </div>
                <div class="entry-header" style="margin-left: 300px;">
                    <div class="frame" id="centered" style="overflow: hidden; height: 733px;">
                        <ul class="clearfix" style="transform: translateZ(0px) translateX(0px); width: 21679px;">
                            <?php $i = 0 ?>
                            @foreach($album_detail as $detail)
                            @if($detail->type == 'img')
                            <li class="relative {{($i == 0)?'active':''}}}" style="height: 777px; width: 1169px;">
                                <img class="lazy" src="/{{$detail->img}}" data-original="" alt="" width="1355" height="900" data-width="1355" data-height="900" style="height: 777px; width: 1169.82px;">
                                <div class="zoom-image">
                                    <a href="/imgs/imgs-detail-gallery/full-1.jpg" data-rel="prettyPhoto[4792]" title="">
                                        <i class="ion-search"></i>
                                    </a>
                                </div>
                            </li>
                            @else
                            <li class="relative" style="height: 777px; width: 1243px;">
                                <img class="lazy video-inside" src="/imgs/imgs-detail-gallery/thumb-video.jpg" width="1440" height="900" data-width="1440" data-height="900" style="height: 777px; width: 1243.2px;">
                                <div class="video-container">
                                    <iframe src="https://www.youtube.com/embed/{{$detail->video_link}}" width="600" height="338" frameborder="0" title="Sergiu si Olesea, Cinematic Trailer by simplu.md" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                                </div>
                            </li>
                            @endif
                            <?php $i++ ?>
                            @endforeach
                        </ul>
                        <div class="additional_items" style="display:none">
                        </div> 
                    </div>
                    <div class="scrollbar">
                        <div class="handle" style="transform: translateZ(0px) translateX(0px); width: 121px;">
                            <div class="mousearea"></div>
                        </div>
                    </div>
                    <div class="controls center">
                        <button class="btn prev" style="display: block!important;"><i class="ion-chevron-left"></i></button>
                        <button class="btn next" style="display: block;"><i class="ion-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="colophon" role="contentinfo" data-role="footer" data-position="fixed" data-fullscreen="true" style="opacity: 1;">
        <div class="full_width_row  full_width_content_row " style=" background-color:#ffffff ">
            <div class="row   row_id_copyright ">
                <div class="copyright align-left twelve columns"> 
                    <p class="copyright align-top">Copyright © 2016 <a href="http://shopay.vn/" target="_blank">Shopay</a>. All rights reserved.</p>
                </div>
            </div>
        </div> 
    </footer>

</div>
@endsection