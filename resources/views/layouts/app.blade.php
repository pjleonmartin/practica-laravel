<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="{{ url('/home') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-envelope"></i> Messages
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('message.form') }}">Send Message</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('message.received') }}">My Messages <span class="badge badge-danger">{{ count(Auth::user()->msg_received) }}</span></a>
                                <a class="dropdown-item" href="{{ route('message.sent') }}">Messages sent</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.curriculum') }}">
                                <i class="fas fa-file-invoice"></i>
                                Curriculum Vitae
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.search') }}">
                                <i class="fas fa-search"></i>
                                Search for people
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-cogs"></i> Options <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('user.configuration') }}">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                                @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('user.admin_panel') }}">
                                    <i class="fas fa-unlock-alt"></i> Admin Panel
                                </a>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>

                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @yield('js')
    </body>
</html>