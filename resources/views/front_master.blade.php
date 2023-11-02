<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title','Welcome to Travel agency')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('meta_keyword','travel agency,booking')" name="keywords">
    <meta content="@yield('meta_description','Welcome to travel agency')" name="description">

    <!-- Favicon -->
    <link href="{{asset('travel_agency')}}/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('travel_agency')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{asset('travel_agency')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('travel_agency')}}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('travel_agency')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('travel_agency')}}/css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Hanuman, 'Times New Roman' !important;
            font-weight: 300;
        }

        .nav {
            font-family: Hanuman, 'Times New Roman' !important;
            font-weight: 300;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('partials.top_navbar')
    <!-- Topbar End -->


    @yield('content')


    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('travel_agency')}}/lib/wow/wow.min.js"></script>
    <script src="{{asset('travel_agency')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('travel_agency')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('travel_agency')}}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset('travel_agency')}}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{asset('travel_agency')}}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{asset('travel_agency')}}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('travel_agency')}}/js/main.js"></script>
</body>

</html>