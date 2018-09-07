<nav class="navbar navbar-expand-md navbar-light navbar-laravel blue-bt">
    <div class="container">
        <a class="navbar-brand text-secondary" href="{{ url('/') }}">
            <i class="fas fa-plane-departure mr-2"></i> <b>{{ config('app.name', 'Laravel') }}</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('control-panel') }}">Control Panel</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Data Master <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('airlines.index') }}">Airline</a>
                            <a class="dropdown-item" href="{{ route('regions.index') }}">Location</a>
                        </div>
                    </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="{{ route('departures') }}">
                            {{ __('Departure') }} <i class="fas fa-external-link-alt mx-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="{{ route('departures') }}">
                            {{ __('Departure') }} <i class="fas fa-external-link-alt  mx-2"></i>
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-secondary" href="{{ route('settings') }}"><i class="fas fa-cog"></i> <span class="ml-2">Setting</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-secondary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> <span class="ml-2">{{ __('Logout') }}</span>
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
