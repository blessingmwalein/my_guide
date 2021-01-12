<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="{{asset('css/style.css')}}">
	
        <!-- Skins -->
        <link rel="stylesheet" href="{{asset('/assets/css/skins/skins.css')}}">
        
        <!-- Responsive Style -->
        <link rel="stylesheet" href="{{asset('/assets/css/responsive.css')}}">

        <!-- CSS only -->

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.1.3.min.js')}}"></script>
    <script src="{{asset('assets/js/html5.js')}}"></script>
    <script src="{{asset('assets/js/twitter/jquery.tweet.js')}}"></script>
    <script src="{{asset('assets/js/jflickrfeed.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.inview.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.tipsy.js')}}"></script>
    <script src="{{asset('assets/js/tabs.js')}}"></script>
    <script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
    <script src="{{asset('assets/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('assets/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollTo.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nav.js')}}"></script>
    <script src="{{asset('assets/js/tags.js')}}"></script>
    <script src="{{asset('assets/js/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</html>
