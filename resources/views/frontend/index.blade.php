<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- End Fonts -->   
   
    <!-- Styles -->
    
{{-- <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">   
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    <!-- Animate.css -->
    
	<link rel="stylesheet" href="{{ asset('css/frontend/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('css/frontend/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.css') }}">
	<!-- Superfish -->
	

    <link rel="stylesheet" href="{{ asset('css/frontend/superfish.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <!-- End Styles -->

    <!-- Scripts -->
    {{-- <script src="{{ asset('jquery/jquery/jquery.min.js') }}">  </script>
    <script src="{{ asset('boostrap/js/bootstrap.bundle.min.js') }}" > </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}} 
    
    <script src="{{ asset('js/frontend/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/frontend/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/frontend/google_map.js') }}" defer></script>
    <script src="{{ asset('js/frontend/hoverIntent.js') }}" defer></script>
    <script src="{{ asset('js/frontend/jquery.easing.1.3.js') }}" defer></script>
    
    <script src="{{ asset('js/frontend/jquery.stellar.min.js') }}" defer></script>
    <script src="{{ asset('js/frontend/jquery.waypoints.min.js') }}" defer></script>
    <script src="{{ asset('js/frontend/main.js') }}" defer></script>
    <script src="{{ asset('js/frontend/modernizr-2.6.2.min.js') }}" defer></script>
    <script src="{{ asset('js/frontend/respond.min.js') }}" defer></script>
    <script src="{{ asset('js/frontend/superfish.js') }}" defer></script>
    
    <!-- End Scripts -->

</head>
<body>
    
       {{-- @include('admin.menu')  --}} 
        @yield('content')
        
        
</body>
</html>
