<!DOCTYPE html>
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>{{ $title or 'Tamila' }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" content="{{ (isset($meta_desc)) ? $meta_desc : ''}}">
    <meta name="keywords" content="{{ (isset($keywords)) ? $keywords : ''}}">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{ url('iSeo/stylesheets/bootstrap.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ url('iSeo/stylesheets/style.css')}}">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{ url('iSeo/stylesheets/colors/color1.css')}}" id="colors">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ url('iSeo/stylesheets/responsive.css')}}">

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{ url('iSeo/stylesheets/animate.css')}}">
    <!-- flexSlider -->
    <link rel="stylesheet" type="text/css" href="{{ url('iSeo/stylesheets/flexslider.css')}}">


    <!-- Favicon and touch icons  -->
    <link href="{{ url('iSeo/icon/apple-touch-icon-48-precomposed.png')}}" rel="apple-touch-icon-precomposed"
          sizes="48x48">
    <link href="{{ url('iSeo/icon/apple-touch-icon-32-precomposed.png')}}" rel="apple-touch-icon-precomposed">
    <link href="{{ url('iSeo/icon/favicon.png')}}" rel="shortcut icon">

    <!--[if lt IE 9]>
    <script src="{{ url('iSeo/javascript/html5shiv.js')}}"></script>
    <script src="{{ url('iSeo/javascript/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="header_sticky">
<section class="loading-overlay">
     <div class="Loading-Page">
         <h2 class="loader">Loading</h2>
     </div>
 </section>
<!-- Boxed -->
<div class="boxed">

    <!-- Header -->
    <header id="header" class="header clearfix">
        <div class="container">
            <div class="row">
                <div class="header-wrap clearfix">

                    <div class="col-md-3">
                        <div id="logo" class="logo">
                            <a href="index.html" rel="home">
                                <h2>Супер пупер сайт!!!</h2>
                            </a>
                        </div>
                        <div class="btn-menu">
                            <span></span>
                        </div><!-- //mobile menu button -->
                    </div>
                    <div class="col-md-12">
                        @yield('navigation')
                    </div>
                </div><!-- /.header-inner -->
            </div><!-- /.row -->
        </div>
    </header><!-- /.header -->
    <div class="wrap_result"></div>

    <!-- Blog posts -->
    <section class="main-content blog-posts blog-single">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget widget-recent-news">
                            @yield('sidebar')
                        </div><!-- /.widget-popular-news -->
                    </div><!-- /.sidebar -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    @if(URL::full() == route('home') )

        @include(env('THEME').'.feedback')

    @endif

    <footer class="footer">
        <div class="footer-widgets">
            <div class="container">
                @yield('footer')
            </div>
        </div>
    </footer>


    <!-- Go Top -->
    <a class="go-top">
        <i class="fa fa-angle-up"></i>
    </a>
</div>
<!-- JavaScripts -->
<script type="text/javascript" src="{{url('iSeo/javascript/comment-reply.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/jquery.easing.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/jquery-waypoints.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/jquery.fitvids.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/parallax.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/jquery.flexslider-min.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/main.js')}}"></script>
<script type="text/javascript" src="{{url('iSeo/javascript/myscripts.js')}}"></script>


</body>
</html>
