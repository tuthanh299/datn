<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link
        href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.1-web/css/all.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('vendors/fontawesome640/all.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/awesome/all.css') }}" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/css/style.css') }}">
    @yield('css')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.partials.header')
        @include('admin.partials.sidebar')
        @yield('content')
        @include('admin.partials.footer')
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    @yield('js')

</body>

</html>
