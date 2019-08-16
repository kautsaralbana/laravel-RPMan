<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('inc.alert')
    <title>@yield('title','RP - Man')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Bootstrap 3.3.7 --}}
    <link rel="stylesheet" href="{{url('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{url('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="{{asset('lte/bower_components/Ionicons/css/ionicons.min.css')}}">
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{url('lte/dist/css/AdminLTE.min.css')}}">
    {{-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. --}}
    <link rel="stylesheet" href="{{url('lte/dist/css/skins/_all-skins.min.css')}}">
    {{-- Google Font --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            {{-- navbar --}}
            @include('inc.navbar')

        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                {{-- Flash Message --}}
                @include('inc.flash-message')
                {{-- content from the view that extends this layout --}}
                @yield('content')
            </div>
        </div>
        {{-- Footer --}}
        @include('inc.footer')
        {{-- ./footer --}}
    </div>

    {{-- jQuery 3 --}}
    <script src="{{url('lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    {{-- SlimScroll --}}
    <script src="{{url('lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    {{-- SlimScroll --}}
    <script src="{{url('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    {{-- FastClick --}}
    <script src="{{url('lte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    {{-- AdminLTE App --}}
    <script src="{{url('lte/dist/js/adminlte.min.js')}}"></script>
    {{-- AdminLTE for demo purposes --}}
    <script src="{{url('lte/dist/js/demo.js')}}"></script>
    {{-- Javascript --}}
    <script src="{{asset('js/app.js')}}"></script>
    {{-- close the alert after 3 seconds. --}}
    <script>$(document).ready(function() { setTimeout(function() { $(".alert").alert('close'); }, 3000); });</script>
</body>

</html>
