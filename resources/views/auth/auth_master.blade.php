<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Login System Agency')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/flag-icon-css/css/flag-icon.min.css">
    <style>
        body {
            font-family: Hanuman, 'Times New Roman';
            font-weight: 300;
        }
    </style>
</head>

<body class="hold-transition login-page" style="background-image: url('images/login_bg.webp'); background-repeat:
    no-repeat;background-size: cover; background-color: #cccccc;">
    <div class="login-box">
        <div class="card-header text-center">
            <a class="h1 text-white" href="{{ route('login') }}"><b>Sourng</b>TECH</a>
        </div>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            @yield('content')
            <!-- /.login-card-body -->
            <!-- Language Dropdown Menu -->

            <?php  $flag = app()->getlocale();
                if($flag=="en"){
                    $flag="us";
                }
            ?>
            <div class="btn-group">
                <a href="{{url('lang/kh')}}" class="btn btn-default {{ $flag=='kh'?'active':'' }}">
                    <i class="flag-icon flag-icon-kh mr-2"></i> ភាសាខ្មែរ
                </a>
                <a href="{{url('lang/en')}}" class="btn btn-default {{ $flag=='us'?'active':'' }}">
                    <i class="flag-icon flag-icon-us mr-2"></i> English
                </a>
            </div>

        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('admin_assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin_assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_assets') }}/dist/js/adminlte.min.js"></script>
</body>

</html>