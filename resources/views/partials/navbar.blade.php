<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-0">
        <a href="{{ route('front.home') }}" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">{{
            trans('menu.home') }}</a>
        <a href="{{ route('front.about') }}"
            class="nav-item nav-link {{ (request()->is('menu.about')) ? 'active' : '' }}">{{
            trans('About') }}</a>
        <a href="{{ route('front.services') }}"
            class="nav-item nav-link {{ (request()->is('services')) ? 'active' : '' }}">{{ trans('menu.services') }}</a>
        <a href="{{ route('front.packages') }}"
            class="nav-item nav-link {{ (request()->is('packages')) ? 'active' : '' }}">{{ trans('menu.packages') }}</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle 
                {{ (request()->is('destination')) ? 'active' : '' }}
                {{ (request()->is('booking')) ? 'active' : '' }}
                {{ (request()->is('guides')) ? 'active' : '' }}
                {{ (request()->is('testimonial')) ? 'active' : '' }}
            " data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu m-0">
                <a href="{{ route('front.destination') }}" class="dropdown-item {{ (request()->is('destination')) ? 'active' : '' }}                    
                    ">Destination</a>
                <a href="{{ route('front.booking') }}"
                    class="dropdown-item {{ (request()->is('booking')) ? 'active' : '' }}">Booking</a>
                <a href="{{ route('front.guides') }}"
                    class="dropdown-item {{ (request()->is('guides')) ? 'active' : '' }}">Travel Guides</a>
                <a href="{{ route('front.testimonial') }}"
                    class="dropdown-item {{ (request()->is('testimonial')) ? 'active' : '' }}">Testimonial</a>
            </div>
        </div>
        <a href="{{ route('front.contact') }}"
            class="nav-item nav-link {{ (request()->is('contact')) ? 'active' : '' }}">{{ trans('global.contacts')
            }}</a>
        @guest

        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ trans('global.login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ trans('global.register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.home') }}">Profile</a>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                    {{ trans('global.logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
        <?php  
        $flag = app()->getlocale();
                if($flag=="en"){
                    $flag="us";
                }
            ?>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle               
            " data-bs-toggle="dropdown"><i
                    class="flag-icon flag-icon-{{ $flag=='kh'?'kh':'' }}{{ $flag=='us'?'us':'' }} mr-2"></i> {{
                $flag=='kh'?'ភាសាខ្មែរ':'' }}{{
                $flag=='us'?"English":'' }}</a>
            <div class="dropdown-menu m-0">
                <a href="{{url('lang/kh')}}" class="dropdown-item {{ $flag=='kh'?'active':'' }}                    
                    "><i class="flag-icon flag-icon-kh mr-2"></i> ភាសាខ្មែរ</a>
                <a href="{{url('lang/en')}}" class="dropdown-item {{ $flag=='us'?'active':'' }}"><i
                        class="flag-icon flag-icon-us mr-2"></i> English</a>
            </div>
        </div>
    </div>

</div>