<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce HTML5 Templatee</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontEnd/')}}/{{asset('public/frontEnd/')}}/images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/custom.css">


    <!-- Modernizr JS -->
    <script src="{{asset('public/frontEnd/')}}/js/vendor/modernizr-3.5.0.min.js"></script>
     <script src="{{asset('public/frontEnd/')}}/js/ajax.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
      @include('frontEnd.includes.header')
        <!-- End Header Area -->

        <div class="body__overlay"></div>
   
            @yield('mainContent')
        
        <!-- Start Footer Area -->
         @include('frontEnd.includes.footer')
        <!-- End Footer Style -->
    
    
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{asset('public/frontEnd/')}}/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="{{asset('public/frontEnd/')}}/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('public/frontEnd/')}}/js/plugins.js"></script>
    <script src="{{asset('public/frontEnd/')}}/js/slick.min.js"></script>
    <script src="{{asset('public/frontEnd/')}}/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('public/frontEnd/')}}/js/main.js"></script>

</body>

</html>