<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Cambo Events" style="width: 150px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="eventsDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Events</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="eventsDropdown">
                        <a class="dropdown-item" href="{{ route('products.index') }}">
                            <i class="fas fa-calendar-alt"></i> All Events
                        </a>
                        <a class="dropdown-item" href="{{ route('products.trending') }}">
                            <i class="fas fa-fire"></i> Trending Events
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('products.category', 'Sports') }}">
                            <i class="fas fa-futbol"></i> Sport
                        </a>
                        <a class="dropdown-item" href="{{ route('products.category', 'Music') }}">
                            <i class="fas fa-music"></i> Music
                        </a>
                        <a class="dropdown-item" href="{{ route('products.category', 'Art') }}">
                            <i class="fas fa-paint-brush"></i> Arts
                        </a>
                        <a class="dropdown-item" href="{{ route('products.category', 'Outdoors') }}">
                            <i class="fas fa-sun"></i> Outdoors
                        </a>
                        <a class="dropdown-item" href="{{ route('products.category', 'Technology') }}">
                            <i class="fas fa-laptop-code"></i> Technology
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
                </li>
                @if (Auth::check() && Auth::user()->role === 'customer')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}">My Tickets</a>
                    </li>
                @elseif (Auth::check() && Auth::user()->role === 'host')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('host.event')}}">Host</a>
                    </li>
                @endif
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Picture"
                                    width="30" height="30" class="rounded-circle mr-2">
                            @endif
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/help') }}">
                                <span>Need Help?</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
