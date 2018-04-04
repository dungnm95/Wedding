@extends('layouts.main')
@section('contend')
<link rel="stylesheet" href="/css/common.css" type="text/css">
<script type="text/javascript" src="/js/sly.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.js"></script>
<div id="content" class="site-content">
    <div class="page-header pricing-header inline-aside row text-center" style="border: none;">
        <h1 class="page-title">Bảng giá</h1>	
        <span class="small-text">
            <span style="color: #000; font-weight: 700;">Chúng tôi cung cấp những gói dịch vụ sau</span>
            <br>Vui lòng chọn 1 gói dưới đây
        </span>
    </div><!-- .page-header -->
    <div id="primary" class="content-area pricing">
        <main id="main" class="site-main" role="main">
            <div class="pricing-block">
                <div class="row">
                    @if(!empty($pricings))
                    @foreach($pricings as $pricing)
                    <div class="col-md-4" style="vertical-align: baseline;">
                        <div style="min-height: 1400px">
                            <h3>{{$pricing->name}}</h3><div class="theme-price">
                                <section class="price">
                                    <span>VND</span>{{number_format($pricing->price)}}
                                </section>
                                <span class="small-text">Bao gồm</span>
                            </div>
                            {!!$pricing->content!!}
                        </div>
                        <div>
                            <ul>
                                <a href="/choose_package/{{$pricing->id}}" class="button small">Chọn gói</a>
                            </ul>
                        </div>


                    </div>

                    @endforeach
                    @endif
                </div><!-- .row -->
            </div><!-- .pricing-block -->
        </main><!-- #main -->
    </div><!-- #primary -->
</div>
@endsection
