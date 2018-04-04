@extends('layouts.main')
@section('contend')
<section id="main">
    <div class="main-container">
        <div class="full_width_row   " style=" background-color:#f5f5f5 ">
            <div class="row element row_id_default1 ">
                <div class="  twelve columns">
                    <div class="row thumb-view ">
                        <div class="twelve columns">
                            <h2 class="content-title">Album Ảnh<em>Cảm xúc qua từng bức ảnh</em></h2>
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
                                {!!$albums->appends(Request::except('page'))->render()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</section>
@endsection