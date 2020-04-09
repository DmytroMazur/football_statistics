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
    
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">   
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- End Styles -->

    <!-- Scripts -->
    
    <script src="{{ asset('jquery/jquery/jquery.min.js') }}">  </script>
    <script src="{{ asset('boostrap/js/bootstrap.bundle.min.js') }}" > </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}} 
        
    <!-- End Scripts -->

</head>
<body>
    <div class="d-flex" id="wrapper">           
        @include('admin.menu') 
        @yield('content')
        
        </div>
        <!-- /#page-content-wrapper -->
      </div>
    <div>
</body>
</html>
