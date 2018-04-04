@extends('layouts.main')
@section('contend')
<link rel="stylesheet" href="/css/common.css" type="text/css">
<script type="text/javascript" src="/js/sly.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.js"></script>
<section id="main" class="sly">
    <div class="main-container  ">
        <div class="full_width_row   " style=" background-color:#f5f5f5 ">
            <div class="row element row_id_1364840303288 ">
                <div class="  twelve columns">
                    <div class="row team-view ">
                        <div class="twelve columns">
                            <h2 class="content-title">
                                <span>Dịch Vụ</span>
                                <em>Chúng tôi luôn mang đến những trải nghiệm thú vị nhất</em>
                            </h2>
                            <div class="clear no-margin"></div>

                        </div> 
                        @foreach($services as $service)
                        <div class="four columns">
                            <article class="team-text-main">
                                <header>
                                    <div class="featimg">
                                        <img src="/{{$service->img}}" alt="">
                                        <div class="socialicons">
                                            <ul class="cosmo-social">
                                                <li>
                                                    <a href="/pricing/{{$service->id}}" class="linkedin"><i class="ion-eye"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </header>
                                <div class="entry-content">
                                    <ul>
                                        <li class="entry-content-name"><h4>{{$service->name}}</h4></li>
                                        <li class="entry-content-function">{{$service->description}}</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection