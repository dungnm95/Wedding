@extends('layouts.main')
@section('contend')
<link rel="stylesheet" href="/css/common.css" type="text/css">
<script type="text/javascript" src="/js/sly.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.js"></script>
<section id="main" style=" background-color:#f5f5f5; " class="sly">
    <div class="row element">
        <div class="featimg  resized-img  ">
            <div class="featbg  resized-img  ">
                <img src="imgs/imgs-detail-blog/main-1170x779.jpg" alt="">
            </div> 
        </div>
    </div>

    <div class="main-container ">
        <div class="full_width_row   " style=" background-color:#f5f5f5 ">
            <div class="row element row_id_additional ">
                <div class="  twelve columns">
                    <article class="post single-post  ">

                        <div class="single-like-container">

                            <span class="meta-likes like ilove set-like voteaction">

                                <em class="like-btn ion-android-favorite-outline">

                                </em>

                                <i class="like-count like-103">{{$news->count_view}}</i>

                            </span>

                        </div>

                        <h1 class="post-title">{{$news->title}}</h1>

                        <div class="meta-details">
                            <ul class="meta-details-list">
                                <li class="meta-details-author"><i class="ion-android-person"></i> {{$news->admin_created}}</li>
                                <li class="meta-details-date"><i class="ion-android-time"></i> {{date('d/m/Y',$news->created_time)}} </li>    
                                <li class="meta-details-date"><i class="ion-android-favorite" style="margin-left: 15px"></i> {{$news->count_view}}</li>
                            </ul>

                        </div> 
                        <div class="excerpt">
                            <p style="margin-bottom: 10px; text-align: center"><img src="/{{$news->img}}"/></p>
                            <br/>
                            {!!$news->content!!}
                        </div>
                        <div class="row bottom-separator">
                            <div class="twelve columns">
                                <div class="related-tabs">
                                    <h3 class="related-title"><span>Tin tức mới nhất</span></h3>
                                </div>
                                <div class="row thumb-view related-posts">
                                    <div id="related-category">
                                        @foreach($new_item as $news)
                                        <div class=" all-elements four columns 1-sss  " data-id="id-154">
                                            <div class="thumb-elem hovermove">
                                                <header class="thumb-elem-header">
                                                    <div class="featimg">
                                                        <img class="the-thumb" src="/{{$news->img}}" alt="" style="position: absolute; left: -29.8006%; top: -28.2946%;">
                                                        <img src="/imgs/thumb-transparent-img.png" alt="Quisque lobortis rutrum volutpat">
                                                    </div>
                                                </header>
                                                <section class="thumb-elem-section " style="display: none;">
                                                    <a href="" title=" Quisque lobortis rutrum volutpat" rel="bookmark" class="thumb-hover-link"></a>
                                                    <ul class="entry-content-list">
                                                        <li class="entry-content-title">
                                                            <a href="/news-detail/{{$news->id}}">
                                                                <h2>{{$news->title}}</h2>
                                                            </a>
                                                        </li>
                                                        <li class="entry-content-delimiter"></li>
                                                        <li class="entry-content-category">
                                                            <ul class="entry-content-category-list">
                                                                <li class="entry-content-category-list-elem">
                                                                    <a href="/news-detail/{{$news->id}}" class="">Xem</a>
                                                                </li> 
                                                            </ul>
                                                        </li>
                                                        <li class="entry-content-meta">
                                                            <span class="meta-likes like ilove set-like voteaction ">
                                                                <em class="like-btn ion-android-favorite-outline">
                                                                </em>
                                                                <i class="like-count like-154">{{$news->count_view}}</i>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </article>

                </div>
            </div>
        </div> 
    </div>

</section>
@endsection

