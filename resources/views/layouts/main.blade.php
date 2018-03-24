<!DOCTYPE html>
<html lang="en-US" class="csstransforms csstransforms3d csstransitions"><!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Wedding Photography</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <style type="text/css">div.row{width:970px;}div.login-box-container{width:970px;}header #header-container .sticky-menu-container .sticky-content{max-width:970px;}@media only screen and (min-width : 767px){#main.folio #galleria,#main.clasic #galleria,#main.image_flow #cosmoImageFlow{margin-left:300px;}}</style>
        <style type="text/css">img.wp-smiley,img.emoji{display:inline!important;border:none!important;box-shadow:none!important;height:1em!important;width:1em!important;margin:0 .07em!important;vertical-align:-0.1em!important;background:none!important;padding:0!important;}</style>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" id="rs-plugin-settings-css" href="/css/settings.css" type="text/css" media="all">

        <style id="rs-plugin-settings-inline-css" type="text/css">.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}</style>

        <link rel="stylesheet" href="/css/cosmo-widgets.css" type="text/css" media="all">
        <link rel="stylesheet" href="/css/foundation.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="/css/frontend.css" type="text/css" media="all">
        <link rel="stylesheet" href="/css/zsmall.css" type="text/css">
        <link rel="stylesheet" href="/css/style_2.css" type="text/css" media="all">
        <link rel="stylesheet" href="/css/css(2)" type="text/css" media="all">
        <link rel="stylesheet" href="/css/mediaelementplayer.css" type="text/css" media="all">
        <link rel="stylesheet" href="/css/ionicons.min.css" type="text/css">
        <link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css">
        <!---->
        <link rel="stylesheet" href="/css/player.css" type="text/css">
        <link rel="stylesheet" href="/css/style-home.css" type="text/css">
        <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700&subset=vietnamese" rel="stylesheet">-->

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="/js/jquery.isotope.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/player.js"></script>
        <script type="text/javascript" src="/js/mediaelement-and-player.min.js"></script>
        

        <style type="text/css">h1,h2,h3,h4,h5,h6{font-family: 'SourceSansPro-Regular', sans-serif;}.single-gallery p.copyright{padding-left:30px;}.page .single-like-container{display:none}.single #main>.featimg>.featmask{position:absolute;width:140%;height:1000px;-webkit-transform:rotate(15deg);-moz-transform:rotate(15deg);-o-transform:rotate(15deg);-ms-transform:rotate(15deg);transform:rotate(15deg);left:0;background:#FFF;margin-top:-1400px;}</style>
        <style type="text/css">.cf-hidden { display: none; } .cf-invisible { visibility: hidden; }</style>
    </head>
    @if(Request::is('gallery-detail'))
    <body class="single single-gallery postid-303 single-format-standard  layout-960 sly template_gallery_layout" style="      ">
    @else
    <body class="home page page-id-50 page-parent page-template-default vertical-scroll template_mainpage123" style="">
    @endif
        <h1 class="hidden">Wedding Photography Template</h1>
        <div id="page" class="container ">
            <div id="fb-root"></div>
            <div class="relative row"></div>
            @include('layouts.menu')
            
            @yield('contend')
            <!-- footer -->
            @if(Request::is('gallery-detail'))
                @include('layouts.footer_gallery_detail')
            @else
                @include('layouts.footer')
            @endif
            <!-- end of footer-->
        </div> 
        <div class="overlay">&nbsp;</div>

        <script type="text/javascript" src="/js/jquery.pageslide.min.js"></script>
        <div id="pageslide" style="display: none;"></div>
        <script type="text/javascript" src="/js/jquery.superfish.js"></script>
        <script type="text/javascript" src="/js/jquery.supersubs.js"></script>
        <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var galleria = {"gallery_type": "sly"};
            var prettyPhoto_enb = {"enb_lightbox": "1"};
            var cosmo_woocommerce_cripts = {"is_enabled": ""};
            var hoverEffect = {"disable_hover_effect": ""};
            var logo_font = [""];
            var gallery_speed = "300";
            var is_mobile = {"logic": ""};
            var Masonry = {"nr_columns": "3"};
            /* ]]> */
        </script>
        <script type="text/javascript" src="/js/searching.js"></script>
        <script type="text/javascript" src="/js/functions.js"></script>
    </body>
</html>