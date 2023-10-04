
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-0">
        <a href="{{ route('front.home') }}" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
        <a href="{{ route('front.about') }}" class="nav-item nav-link {{ (request()->is('about')) ? 'active' : '' }}">About</a>
        <a href="{{ route('front.services') }}" class="nav-item nav-link {{ (request()->is('services')) ? 'active' : '' }}">Services</a>
        <a href="package.html" class="nav-item nav-link">Packages</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu m-0">
                <a href="destination.html" class="dropdown-item">Destination</a>
                <a href="booking.html" class="dropdown-item">Booking</a>
                <a href="team.html" class="dropdown-item">Travel Guides</a>
                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                <a href="404.html" class="dropdown-item">404 Page</a>
            </div>
        </div>
        <a href="contact.html" class="nav-item nav-link">Contact</a>
    </div>
    <a href="" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
</div>
