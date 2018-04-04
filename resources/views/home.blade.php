@extends('layouts.main')
@section('contend')
<section id="main" class="sly">
    <div class="main-container  ">
        <div class="row   row_id_1364917309482 ">
            <div class="twelve columns"><div style="border-top: 1px dotted #e5e5e5;" class="delimiter-type pointed margin_30px "></div></div>        
        </div>
        <div class="row element row_id_1364917328102 ">
            <div class="textelement align-center twelve columns"> 
                <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                    <div id="myCarousel" class="carousel slide slide-banner" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <ul class="carousel-inner" role="listbox">  
                            <li class="item active">
                                <img src="/imgs/banner1.jpg" alt="Chania" width="460" height="345">
                            </li>
                            <li class="item">
                                <img src="/imgs/banner2.jpg" alt="Chania" width="460" height="345">
                            </li>
                            <li class="item">
                                <img src="/imgs/banner3.jpg" alt="Chania" width="460" height="345">
                            </li>
                        </ul>

                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="ion-chevron-left" aria-hidden="true"></span>                                   
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="ion-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div> 
                </div>       
            </div>
            <div class="clearfix"></div>
            <div class="row element row_id_default1 ">
                <div class="  twelve columns">
                    <div class="row thumb-view ">
                        <div class="twelve columns">
                            <h2 class="content-title"><span>Album Ảnh</span><em>Cảm xúc qua từng bức ảnh</em></h2>
                            <div class="clear"></div>
                            <div class=" row    thumbs-list image-grid " id="ul-9510"> 
                                @foreach($albums as $album)
                                <div class=" all-elements four columns " data-id="id-62">
                                    <div class="thumb-elem hovermove">
                                        <header class="thumb-elem-header">
                                            <div class="featimg">
                                                <img class="the-thumb" src="/{{$album->img}}" alt="" style="position:absolute">
                                                <img src="/imgs/thumb-transparent-img.png" alt="Sed posuere ultricies mauris eget mollis">
                                            </div>
                                        </header>
                                        <section class="thumb-elem-section ">
                                            <a href="/gallery-detail/{{$album->id}}" title="" rel="bookmark" class="thumb-hover-link"></a>
                                            <ul class="entry-content-list">
                                                <li class="entry-content-title"><a href="/gallery-detail/{{$album->id}}"><h3>{{$album->title}}</h3></a></li>
                                                <li class="entry-content-delimiter"></li>
                                                <li class="entry-content-category">
                                                    <ul class="entry-content-category-list">
                                                        <li class="entry-content-category-list-elem"><a href="/services" class="">{{$album->service_name}}</a></li>
                                                    </ul>
                                                </li>
                                                <li class="entry-content-meta">
                                                    <span class="meta-likes like ilove set-like voteaction">
                                                        <em class="like-btn ion-android-favorite-outline">
                                                        </em>
                                                        <i class="like-count like-62">{{$album->count_view}}</i>
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
            </div>
            <div class="text-center" style="margin: 15px 0 10px 0;">
                <img src="/images/view-delimiter.png" style="width: 30%"/>
            </div>
            <div class="row   row_id_1364920727230 ">
                <div class="  twelve columns">
                    <div style="" class="delimiter-type white_space margin_30px "></div>       
                </div>      
            </div>
            <div class="row element row_id_1364575549081 ">
                <div class="  twelve columns">
                    <div class="row list-view ">
                        <div class="twelve columns" id="div-1020"> 
                            <h2 class="content-title"><span>Tin tức</span><em>luôn cập nhật những ưu đãi hấp dẫn</em></h2>
                            @if(!empty($news) || $new != null)
                            @foreach($news as $new)
                            <div class="list-elem list-medium-image element ">
                                <div class="row">
                                    <div class="six columns">
                                        <header class="list-elem-header  ">
                                            <div class="featimg">
                                                <a class="list-hover-link" href="/gallery-detail/{{$new->id}}"></a>                                
                                                <img src="/{{$new->img}}" alt="">
                                            </div>
                                            <div class="hover-effect">
                                                <ul class="hover-effect-meta">
                                                    <li class="entry-content-meta">
                                                        <span class="meta-likes like ilove set-like voteaction">
                                                            <em class="like-btn ion-android-favorite-outline">
                                                            </em>
                                                            <i class="like-count like-120">{{$new->count_view}}</i>
                                                        </span>
                                                    </li>
                                                    <li class="hover-effect-meta-delimiter"></li>
                                                    <li class="hover-effect-meta-category">
                                                        <ul class="hover-effect-meta-category-list">
                                                            <li class="entry-content-category-list-elem">
                                                                <a href="" class="">Xem</a>
                                                            </li>                                          
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </header> 
                                    </div>
                                    <div class="six columns">
                                        <section class="list-elem-section ">
                                            <ul class="entry-content-list">
                                                <li class="entry-content-title">
                                                    <h3>
                                                        <a href="/gallery-detail/{{$new->id}}" title="{{$new->title}}" rel="bookmark">{{$new->title}}</a>
                                                    </h3>
                                                </li>
                                                <li class="entry-content-meta">
                                                    <ul class="entry-content-meta-list">
                                                        <li class="entry-content-meta-author">
                                                            <i class="ion-android-person"></i>{{$new->admin_created}}                                 
                                                        </li>
                                                        <li class="entry-content-meta-date">
                                                            <i class="ion-android-time"></i>{{date('d/m/Y', $new->created_time)}} 
                                                        </li>                                    
                                                    </ul>
                                                </li>
                                                <li class="entry-content-excerpt">
                                                    {{$new->pre_content}}                            
                                                </li>                                                                                  
                                            </ul>
                                        </section>
                                    </div>
                                </div>
                            </div>   
                            @endforeach
                            @endif
                                       
                        </div>
                    </div>
                </div>
            </div>
            <div class="row element row_id_additional ">
                <div class="  twelve columns"></div>          
            </div>    
        </div>
    </div>
</section>
@endsection