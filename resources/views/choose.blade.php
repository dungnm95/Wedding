@extends('layouts.main')
@section('contend')
<link rel="stylesheet" href="/css/common.css" type="text/css">
<section id="main" class="sly">
    <div class="main-container  ">
        <div class="full_width_row   " style=" background-color:#f5f5f5 ">
            <div class="row element row_id_additional ">
                <div class="  twelve columns">
                    <article class="post single-post  no-meta ">
                        <div class="single-like-container">
                            <span class="meta-likes like ilove set-like voteaction">
                                <em class="like-btn icon-like-empty">
                                </em>
                                <i class="like-count like-58">23</i>
                            </span>
                        </div>
                        <h1 class="post-title">Đặt hàng</h1>
                        <div class="excerpt">
                            <p>
                                @if(!empty($message))
                                {{$message['message']}}
                                @endif
                            </p>
                            <p class="clearfix"></p>
                            <div class="twocol_one first">
                                <div class="contact_info"></div>
                                <br>
                                <div class="contact-form">
                                     <form class="contactform" id="contact_form_1473645985" method="post">
                                         {{ csrf_field() }}
                                        <fieldset>
                                            <div id="contact_response" class="send-error"></div>
                                            <p class="content_name input">
                                                <label for="contact_name">Tên (bắt buộc)</label>
                                                <input type="text" tabindex="1" size="22" value="" id="contact_name" name="name">
                                            </p>
                                            <p class="content_email input">
                                                <label for="contact_email">Email (bắt buộc)</label>
                                                <input type="text" tabindex="2" size="22" value="" id="contact_email" name="email">
                                            </p> 
                                            <p class="content_phone input">
                                                <label for="contact_phone">Điện thoại (bắt buộc)</label>
                                                <input type="text" tabindex="3" size="22" value="" id="contact_phone" name="phone">
                                            </p>
                                            <p class="content_phone input">
                                                <label for="contact_phone"><b><i>Tôi muốn đặt gói {{$pricing->name}} của dịch vụ {{$pricing->service_name}} trị giá: {{number_format($pricing->price)}} Đ</i></b></label>
                                            </p>
                                            <p class="content_message comment-form-comment textarea">
                                                <label for="contact_phone">Ghi chú</label>
                                                <textarea tabindex="4" rows="10" cols="100%" id="contact_message" name="message" style="min-height: 130px;"></textarea>
                                            </p>
                                            <p class="form-submit submit gray">
                                                <input type="submit" value="Đặt lịch" tabindex="5" id="submit" name="btn_submit">
                                            </p>
                                            <div class="container_msg"></div>
                                        </fieldset>
                                    </form>

                                </div>

                            </div>
                            <div class="twocol_one last">
                                <img src="/imgs/map.png" alt="map" width="440" height="250" class="alignright size-full wp-image-249" sizes="(max-width: 440px) 100vw, 440px">
                            </div>
                            <p class="clearfix"></p>
                            <p></p>
                            <div class="pagenumbers">
                            </div>
                        </div>
                    </article>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection