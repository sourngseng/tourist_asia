@extends('front_master')
@push('banner_page')
<div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
    <h1 class="display-3 text-white animated slideInDown">{{$title}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ trans('menu.home') }}</a></li>
            <li class="breadcrumb-item text-white active" aria-current="page">{{$title}}</li>
        </ol>
    </nav>
</div>
@endpush
@section('content')
<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1>
            <!-- <img src="{{asset('travel_agency')}}/img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        @include('partials.navbar')
    </nav>

    @include('partials.banner_page')


</div>
<!-- Navbar & Hero End -->

<!-- About Start -->
@include('partials.services')
<!-- About End -->

<!-- Team Start -->
@include('partials.our_guides')
<!-- Team End -->

@endsection