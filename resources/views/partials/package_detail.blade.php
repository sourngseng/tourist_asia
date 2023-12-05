<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            {{-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative">
                    <img class="img-fluid position-absolute w-100"
                        src="{{ url('storage/package') }}/{{ $package->photo }}" alt="{{ $package->photo }}">
                </div>
            </div> --}}
            {{-- @dd($package) --}}
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">{{ $package->title }}</h6>
                <h1 class="mb-4">{{ $package->title }}</h1>
                {!! $package->detail !!}

                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Handpicked Hotels</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Book Now</a>
            </div>
            <div class="col-lg-3 col-md-3 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative">

                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('travel_agency')}}/img/team-2.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>