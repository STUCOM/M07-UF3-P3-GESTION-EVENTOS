<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
        <nav>
            <ul>
                <!-- Login si no se está autenticado -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <!-- en caso de estar autenticado -->
                    <li>

                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>

                        <div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            
        </nav>

        <main>
            @yield('content')
        </main>
</body>
</html>
