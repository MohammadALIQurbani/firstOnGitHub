<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Best app ever</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/dasbhoard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dasbhoard/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dasbhoard/plugins/summernote/summernote-bs4.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{ asset('template/dasbhoard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dasbhoard/plugins/toastr/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Font: Source Sans Pro -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        @include('layouts.partial.navbar')

        @include('layouts.partial.aside')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-1">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        @include('layouts.partial.footer')
    </div>
</body>

</html>
