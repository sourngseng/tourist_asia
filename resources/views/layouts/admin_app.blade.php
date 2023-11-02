<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Login System as ')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/adminlte.min.css">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/flag-icon-css/css/flag-icon.min.css">
    @stack('styles')
    <style>
        body {
            font-family: Hanuman, 'Times New Roman';
            font-weight: 300;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partials.main_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @stack('content_header')

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; {{ date("Y") }} <a href="https://sourngtech.blogspot.com">SourngTECH</a>.</strong>
            All
            rights
            reserved.
        </footer>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin_assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin_assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_assets') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('admin_assets') }}/dist/js/demo.js"></script> --}}
    @stack('scripts')
</body>

</html>