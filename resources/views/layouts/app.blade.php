<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Taskmanager') }}</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>  
</head>
<body>
    <div id="app">
        @include('inc/navbar')
         <div class="container">
            @include('inc/messages')
            @yield('content')
         </div>
        @include('inc/footer')
    </div>

    <!-- Script for WYSIWYG Editor -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
    <!-- End Script -->
</body>
</html>