@extends('layouts.main')
@section('contend')
<link rel="stylesheet" href="/css/common.css" type="text/css">
<script type="text/javascript" src="/js/sly.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.js"></script>
<section id="main" class="sly">
    <div class="main-container  ">
        <div class="full_width_row   " style=" background-color:#f5f5f5 ">
            <div class="row element row_id_1364585609740 ">
                <div class="  twelve columns"><div class="row list-view ">
                        <div class="twelve columns" id="div-650"> 
                            <h2 class="content-title"><span>Tin tức</span><em>Cập nhật những ưu đãi hấp dấn</em></h2>
                            @if(!empty($news) && $news != null)
                            @foreach($news as $new)
                            <div class="list-elem list-medium-image element ">
                                <div class="row">
                                    <div class="six columns">
                                        <header class="list-elem-header  ">
                                            <div class="featimg">
                                                <a class="list-hover-link" href="/news-detail/{{$new->id}}"></a>
                                                <img src="/{{$new->img}}" alt="Sed eget lacus massa, elementum">
                                            </div>
                                            <div class="hover-effect">
                                                <ul class="hover-effect-meta">
                                                    <li class="entry-content-meta">
                                                        <span class="meta-likes like ilove set-like voteaction                                     ">
                                                            <em class="like-btn ion-android-favorite-outline">
                                                            </em>
                                                            <i class="like-count like-103">{{$new->count_view}}</i>
                                                        </span>
                                                    </li>
                                                    <li class="hover-effect-meta-delimiter"></li>
                                                    <li class="hover-effect-meta-category">
                                                        <ul class="hover-effect-meta-category-list">
                                                            <li class="entry-content-category-list-elem"><a href="/news-detail/{{$new->id}}" class="">Xem</a></li> </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </header>
                                    </div>
                                    <div class="six columns">
                                        <section class="list-elem-section ">
                                            <ul class="entry-content-list">
                                                <li class="entry-content-title"><h3><a href="/news-detail/{{$new->id}}" title="{{$new->title}}" rel="bookmark">{{$new->title}}</a></h3></li>
                                                <li class="entry-content-meta">
                                                    <ul class="entry-content-meta-list">
                                                        <li class="entry-content-meta-author">
                                                            <i class="ion-android-person"></i>{{$new->admin_created}}                                    
                                                        </li>
                                                        <li class="entry-content-meta-date">
                                                            <a href=""><i class="ion-android-time"></i>{{date('d/m/Y', $new->created_time)}} </a> 
                                                        </li> 
                                                        @if($new->is_hot == 'yes')
                                                        <li style="color: red;font-weight: 600;margin-left: 10px;"><img src="/images/like.png" style="width:15px;margin-top: -5px;"/>HOT</li>
                                                        @endif
                                                    </ul>
                                                </li>
                                                <li class="entry-content-excerpt">{{$new->pre_content}}</li>                               
                                            </ul>
                                        </section>
                                    </div>
                                </div>
                            </div> 
                            
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="pag">
                        <ul class="b_pag center p_b">
                            {!!$news->appends(Request::except('page'))->render()!!}
<!--                            <li><span class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="">2</a></li>
                            <li><a class="page-numbers" href="">3</a></li>
                            <li><a class="page-numbers" href="">4</a></li>
                            <li><a class="next page-numbers" href="">Next »</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
@endsection