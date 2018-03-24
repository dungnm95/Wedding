@extends('layouts.main')
@section('contend')
<link rel="stylesheet" href="/css/common.css" type="text/css">
<script type="text/javascript" src="/js/sly.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.js"></script>

<div class="header-collapser ion-chevron-up animated"></div>
<section id="main" class="sly">
    <div class="main-container " style="height: 738px; opacity: 1;">
        <div class=" show-collapse">
            <div class="gallery-info" style="display: block;">
                <h1 class="post-title">
                    Large number of images </h1>
                <div class="single-like-container">
                    <span class="meta-likes like ilove set-like voteaction">
                        <em class="like-btn ion-android-favorite-outline">
                        </em>
                        <i class="like-count like-303">125</i>
                    </span>
                </div>
                <div class="meta-details"><ul class="meta-details-list">
                        <li class="meta-details-author"><i class="ion-android-person"></i> <a href=""> Photographer</a></li>
                        <li class="meta-details-date"><i class="ion-android-time"></i> 3 years ago </li>
                    </ul>
                </div>
                <div class="content">
                    <p>Dolorem&nbsp;ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
<!--                <nav class="hotkeys-meta">
                    <a class="ion-chevron-left" href="" title="Sed posuere ultricies mauris eget mollis"></a>
                </nav>-->
            </div>
            <div class="collapse-btn" style="margin-left: 0px;">
                <i class="ion-chevron-left"></i>
                <span>Click to collapse</span>
            </div>
            <div class="entry-header" style="margin-left: 300px;">
                <div class="frame" id="centered" style="overflow: hidden; height: 733px;">
                    <ul class="clearfix" style="transform: translateZ(0px) translateX(0px); width: 21679px;">
                        <li class="relative active" style="height: 777px; width: 1169px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-1.jpg" data-original="" alt="" width="1355" height="900" data-width="1355" data-height="900" style="height: 777px; width: 1169.82px;">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-1.jpg" data-rel="prettyPhoto[4792]" title="">
                                    <i class="ion-search"></i>
                                </a>
                            </div>
                        </li>
                        <li class="relative" style="height: 777px; width: 1243px;">
                            <img class="lazy video-inside" src="imgs/imgs-detail-gallery/thumb-video.jpg" width="1440" height="900" data-width="1440" data-height="900" style="height: 777px; width: 1243.2px;">
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/OUB6zKc-Tos" width="600" height="338" frameborder="0" title="Sergiu si Olesea, Cinematic Trailer by simplu.md" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                                <!--<iframe width="600" height="338" src="https://www.youtube.com/embed/OUB6zKc-Tos" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
                            </div>
                        </li>
                        <li class="relative" style="height: 777px; width: 779px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-2.jpg" alt="" width="1355" height="900" data-width="1355" data-height="900" >
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-2.jpg" data-rel="prettyPhoto[4792]" title="">
                                    <i class="ion-search"></i>
                                </a>
                            </div>
                        </li>
                        <li class="relative" style="height: 777px; width: 1169px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-3.jpg" alt="" width="1355" height="900" data-width="1355" data-height="900" style="height: 777px; width: 1169.82px;">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-3.jpg" data-rel="prettyPhoto[4792]" title="">
                                    <i class="ion-search"></i>
                                </a>
                            </div>
                        </li>
                        <li class="relative" style="height: 777px; width: 1169px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-4.jpg" alt="" width="1355" height="900" data-width="1355" data-height="900">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-4.jpg" data-rel="prettyPhoto[4792]" title=""><i class="ion-search"></i></a>
                            </div>
                        </li>
                        <li class="relative" style="width: 1167px; height: 777px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-5.jpg" alt="" width="1352" height="900" data-width="1352" data-height="900" style="height: 777px; width: 1167.23px;">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-5.jpg" data-rel="prettyPhoto[4792]" title=""><i class="ion-search"></i></a>
                            </div>
                        </li>
                        <li class="relative" style="width: 1167px; height: 777px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-6.jpg" alt="" width="1352" height="900" data-width="1352" data-height="900">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-6.jpg" data-rel="prettyPhoto[4792]" title=""><i class="ion-search"></i></a>
                            </div>
                        </li>
                        <li class="relative" style="width: 1167px; height: 777px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-7.jpg" alt="" width="1352" height="900" data-width="1352" data-height="900">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-7.jpg" data-rel="prettyPhoto[4792]" title=""><i class="ion-search"></i></a>
                            </div>
                        </li>
                        <li class="relative" style="width: 1169px; height: 777px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-8.jpg" alt="" width="1355" height="900" data-width="1355" data-height="900">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-8.jpg" data-rel="prettyPhoto[4792]" title=""><i class="ion-search"></i></a>
                            </div>
                        </li>
                        <li class="relative" style="width: 1169px; height: 777px;">
                            <img class="lazy" src="imgs/imgs-detail-gallery/full-9.jpg" alt="" width="1355" height="900" data-width="1355" data-height="900">
                            <div class="zoom-image">
                                <a href="imgs/imgs-detail-gallery/full-9.jpg" data-rel="prettyPhoto[4792]" title=""><i class="ion-search"></i></a>
                            </div>
                        </li>
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
                    <button class="btn prev" style="display: block;"><i class="ion-chevron-left"></i></button>
                    <button class="btn next" style="display: block;"><i class="ion-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection